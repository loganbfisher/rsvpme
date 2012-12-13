<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','register'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView($username)
	{
		$model = User::model()->find('username = ?', array($username));



		if (!$model)
			throw new CHttpException(404,'The specified user does not exist.');

                $friend_model = User_friend::model()->find('user_id = ? AND friend_user_id = ?', array(Yii::app()->user->getId(), $model->id));

                $are_we_friends = $friend_model !== null && !$friend_model->getIsNewRecord();

		$this->render('view',array(
			'model'=>$model,
			'is_owner'=>($model->id === Yii::app()->user->getId()),
                        'are_we_friends'=>$are_we_friends,

		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionRegister()
	{
		$model=new User;

		$service_name = null;
		if (isset($_SESSION['service_identity'])){
			$service_name = isset($_SESSION['service_identity']['service_name']) ? $_SESSION['service_identity']['service_name'] : '';
			$model->{$service_name.'_id'} = $_SESSION['service_identity']['id'];
			$model->attributes = $_SESSION['service_identity'];
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect('/');
		}

		$this->render('register',array(
			'model'=>$model,
			'service_name'=>$service_name
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model = User::model()->findByPk(Yii::app()->user->getId());

		if (!$model)
			throw new CHttpException(404,'Your user account count not be found.');

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->user_id = Yii::app()->user->getId();

			$model->avatar = CUploadedFile::getInstanceByname('User[avatar]');
			if ($model->avatar instanceof CUploadedFile) {
				$filename = APPPATH . 'webroot/' . Yii::app()->params->avatarPath . $model->user_id;
				$extension = User::$avatarExtension;

				foreach(User::$avatarSizes as $size => $dimensions){
					$image = Yii::app()->image->load($model->avatar->getTempName());
					$image->resize($dimensions[0], $dimensions[1]);
					$image->save($filename . '_' . $size . $extension);
				}

				$model->has_avatar = 1;
			}

			if($model->save())
				$this->redirect(array('view','username'=>$model->username));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                $model = new User;
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
                        'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='User-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
