<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);

?><h1>Your Dashboard</h1>

<div class="two-col-wrapper-container clearfix">
<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="left_col">
  <div><img src="<?='images/uploads/'. $model->profile_photo ;?>" /></div>
  <!-- modal content -->
  <div id="osx-modal-content">
      <div id="osx-modal-title">Edit profile picture</div>
      <div class="close"><a href="#" class="simplemodal-close">x</a></div>
      <div id="osx-modal-data">
          <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'profile-form',
                    'enableAjaxValidation'=>true,
                    'htmlOptions' => array('enctype'=>'multipart/form-data'),
            )); ?>
            <div class="row">
                <?php echo $form->labelEx($model,'profile_photo'); ?>
                <?php echo Chtml::activeFileField($model,'profile_photo'); ?>
                <?php echo $form->error($model,'profile_photo'); ?>
            </div>
            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
            </div>
          <?php $this->endWidget(); ?>
      </div>
  </div>
  <div style="clear: both; height: 45px; margin-top: 10px; float: right;">
    <a href='#' class='osx edit-prof-icon' title="Edit profile image"></a>
    <? if(UserModule::isAdmin()): ?>
    <?=Chtml::link('Manage Users', array('/user/admin'))?>
    <?=Chtml::link('List Users', array('/user'))?>
    <? endif; ?>
    <?=Chtml::link('', array('edit'),array('class'=>'edit-profile-icon', 'title'=>'Edit Profile'))?>
    <?=Chtml::link('', array('changepassword'),array('class'=>'account-settings-icon','title'=>'Change Password'))?>
  </div>
</div>

<?php $this->widget('zii.widgets.CListView', array(
        'id'=>'event_right_col',
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>