<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>



<div class="form">
<h1 class="fleft">Sign in</h1><?=CHtml::link('Create account', array('/user/create'),array('class'=>'fleft; create-account-link')); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'username',array('class'=>'login-inputs','value'=>'Your username.')); ?>
		<?php echo $form->error($model,'username'); ?>
    <div class="clear"></div>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model,'password',array('class'=>'login-inputs','value'=>'Your password.')); ?>
		<?php echo $form->error($model,'password'); ?>
    <div class="clear"></div>
	</div>

	<div class="row rememberMe" style="display:none; ">
		<?php echo $form->checkBox($model,'rememberMe',array('checked'=>'checked')); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
    <div class="clear"></div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Sign in', array('class'=>'login-btn')); ?>
    <div class="clear"></div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
