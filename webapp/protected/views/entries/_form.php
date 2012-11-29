<?php
/* @var $this EntriesController */
/* @var $model Entry */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entry-form',
        'action'=>Yii::app()->createUrl('//entries/create'),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'additional_guests'); ?>
		<?php echo $form->textField($model,'additional_guests',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'additional_guests'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'confirmation_code'); ?>
		<?php echo $form->textField($model,'confirmation_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'confirmation_code'); ?>
	</div>


		<?php echo CHtml::submitButton($model->isNewRecord ? 'RSVP' : 'Save',array('class'=>'submit')); ?>

<?php $this->endWidget(); ?>
