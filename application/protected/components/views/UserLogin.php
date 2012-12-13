<script>
function error(form, data, hasError){

		if(hasError) {
			for(var errorField in data) {
				 $('#' + errorField + '_em_', form).fadeIn();
			}
		}
		return true;
	};error;
</script>
<? $form=$this->beginWidget('CActiveForm', array(
'action'=>'/site/login',
'id'=>'login-form',
'htmlOptions'=>array('class'=>'fleft'),
'enableAjaxValidation'=>true,
'clientOptions'=>array(
	'hideErrorMessage'=>true,
	'validateOnSubmit'=>true,
	'validateOnChange'=>false,
	'afterValidate'=>'js:error'
)
)); ?>
<style>
.errorMessage {
	position: absolute;
	padding: 10px;
	font-size: 12px;
	font-weight: bold;
	color: #fff;
	text-background: 1px 1px #000;
	top:-30px;
	background:#B12121;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright:5px;
	-moz-border-radius-bottomleft:5px;
	-moz-border-radius-bottomright:5px;
	-webkit-border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;
	-webkit-border-bottom-left-radius:5px;
	-webkit-border-bottom-right-radius:5px;
	border-top-left-radius:5px;
	border-top-right-radius:5px;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
}
</style>
<div style="width: 100%;" class="relative">
	<?=$form->error($model,'password'); ?>
	<?=$form->error($model,'username'); ?>
	<?=$form->error($model,'rememberMe'); ?>
</div>
<div style="width: 150px;" class="padding-ten fleft relative">
	<?=$form->textField($model,'username', array('value' => 'User Name', 'title'=>'User Name' )); ?>
</div>
<div style="width: 150px;" class="padding-ten fleft relative">
	<?=$form->passwordField($model,'password', array('value' => 'Password', 'title'=>'Password')); ?>
</div>
<div style="width: 75px;" class="padding-ten fleft">
	<?=CHtml::submitButton('Login'); ?>
</div>
<div style="display: none;" class="relative">
	<?=$form->label($model,'rememberMe'); ?>
	<?=$form->checkBox($model,'rememberMe', array('checked' => 'checked')); ?>
</div>
<? $this->endWidget(); ?>