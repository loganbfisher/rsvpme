<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
                Yii::import('ext.euploadedimage.EUploadedImage', true);
		$model = $this->loadUser();
                $event =new Event();

                /** this pulls the events for the user **/
                $criteria = new CDbCriteria;
                $criteria->condition = 'user_id = :user_id';
                $criteria->params = array(
                  ':user_id' => Yii::app()->user->getId(),
                );
                $dataProvider = new CActiveDataProvider('Event', array(
                'criteria'=>$criteria,
                ));

                if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];

                        $model->profile_photo = EUploadedImage::getInstance($model,'profile_photo');
                        $model->profile_photo->maxWidth = 250;
                        $model->profile_photo->maxHeight = 250;

                        $model->profile_photo->thumb = array(
                            'maxWidth' => 50,
                            'maxHeight' => 50,
                            'dir' => 'thumbs',
                            'prefix' => 'asdf_',
                        );

                        if ($model->profile_photo->saveAs('images/uploads/'.$model->profile_photo));
                       if($model->save());
                       $this->redirect(array('profile','id'=>$model->id));




		}

	    $this->render('profile',array(
	    	'model'=>$model,
                'event'=>$event,
                'profile'=>$model->profile,
                'dataProvider'=>$dataProvider,
	    ));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
                Yii::import('ext.euploadedimage.EUploadedImage', true);
		$model = $this->loadUser();
		$profile=$model->profile;

		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];

                        $model->profile_photo = EUploadedImage::getInstance($model,'profile_photo');
                        $model->profile_photo->maxWidth = 250;
                        $model->profile_photo->maxHeight = 250;

                        $model->profile_photo->thumb = array(
                            'maxWidth' => 50,
                            'maxHeight' => 50,
                            'dir' => 'thumbs',
                            'prefix' => 'asdf_',
                        );

                        if ($model->profile_photo->saveAs('images/uploads/'.$model->profile_photo));

			if($model->validate()&&$profile->validate()) {
				$model->save();
				$profile->save();
                Yii::app()->user->updateSession();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} else $profile->validate();
		}

		$this->render('edit',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {

			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}

			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = UserModule::encrypting($model->password);
						$new_password->activkey=UserModule::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
	    }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}