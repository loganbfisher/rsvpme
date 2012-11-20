<div class="header">
  <h1 class="logo">
    <?= CHtml::link('rsvp.me', array('/site/index')); ?>
  </h1>
  <?= CHtml::link('Create Event', array('/event/create'), array('class' => 'login-text fright')); ?>
  <div class="clear"></div>
</div>
<div>
  <?php
  $this->widget('zii.widgets.CMenu', array(
    'items'=>array(
        array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
    ),
));
  ?>
</div>