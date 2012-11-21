<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>
<div class="module-wrapper">
  <div class="title-wrapper">
    <h1 class="page-title"><?php echo UserModule::t("Login"); ?></h1>
    <div class="module-container">
      <div class="padding">
        <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

        <div class="success">
                <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
        </div>

        <?php endif; ?>

        <div class="form">
        <?php echo CHtml::beginForm(); ?>

                <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

                <?php echo CHtml::errorSummary($model); ?>

                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'Username'); ?>
                        <?php echo CHtml::activeTextField($model,'username') ?>
                </div>

                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'Password'); ?>
                        <?php echo CHtml::activePasswordField($model,'password') ?>
                </div>

                <div class="row">
                        <p class="hint login">
                         <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
                        </p>
                </div>

              <!--  <div class="row rememberMe">
                        <?php //echo CHtml::activeCheckBox($model,'rememberMe'); ?>
                        <?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?> -->
                </div>

                <div class="row submit">
                  <div><?php echo CHtml::submitButton(UserModule::t("Login"),array("class"=>"submit")); ?></div>


                </div>
                <div class="row register submit">
                <div><?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl,array('class'=>'submit')); ?></div>
                </div>
        <?php echo CHtml::endForm(); ?>
        </div><!-- form -->


        <?php
        $form = new CForm(array(
            'elements'=>array(
                'username'=>array(
                    'type'=>'text',
                    'maxlength'=>32,
                ),
                'password'=>array(
                    'type'=>'password',
                    'maxlength'=>32,
                ),
                'rememberMe'=>array(
                    'type'=>'checkbox',
                )
            ),

            'buttons'=>array(
                'login'=>array(
                    'type'=>'submit',
                    'label'=>'Login',
                ),
            ),
        ), $model);
        ?>
      </div>
    </div>
  </div>
</div>

