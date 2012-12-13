<?php

class User_friendController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($username)
	{
		$user = User::model()->find('username = ?', array($username));
		if (!$user)
			throw new CHttpException(404, 'The specified user does not exist.');

		$response = array();
		$response['result'] = false;


		try {
			$model = $this->loadModel($user->id);
		} catch(CHttpException $e) {
			$model=new User_friend;
			$model->user_id = Yii::app()->user->getId();
			$model->friend_user_id = $user->id;
                        $model->user_id = $user->id;
			$model->friend_user_id = Yii::app()->user->getId();
		}

		if (!$model->getIsNewRecord())
			throw new CHttpException(404, "You've already added this user as a friend.");

		// @TODO move this to model validation
		if ($model->user_id === $model->friend_user_id)
			throw new CHttpException(404, 'You cannot add yourself as a friend.');

		$response['result'] = $model->save();
		if (!$response['result'])
			$response['errors'] = $model->getErrors();

		$this->redirect(array('user/profile'));
		Yii::app()->end();
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete($username)
	{
		$user = User::model()->find('username = ?', array($username));
		if ($user === null)
			throw new CHttpException(404,'The specified user does not exist.');

		$this->loadModel($user->id)->delete();

		$this->redirect(array('user_friend/index', 'username'=>Yii::app()->user->getName()));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($username)
	{
		$user = User::model()->find('username = ?', array($username));
		if ($user === null)
			throw new CHttpException(404,'The specified user does not exist.');

		$dataProvider=new CActiveDataProvider('User_friend');
		$dataProvider->setCriteria(array(
			'with' => array('friend_user'),
			'condition'=>'t.user_id = ?',
			'params'=>array($user->id)
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'user'=>$user,
			'is_owner'=>($user->id === Yii::app()->user->id),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model=new User_friend('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User_friend']))
			$model->attributes=$_GET['User_friend'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel($friend_user_id)
	{
		if($this->_model===null)
		{
			if($friend_user_id)
				$this->_model=User_friend::model()->find('user_id = ? AND friend_user_id = ?', array(Yii::app()->user->getId(), $friend_user_id));
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
