<div class="header">
  <h1 class="logo">
   <? if (!Yii::app()->user->isGuest) {
      echo CHtml::link('rsvp.me', array('/user/profile'));
    } else {
      echo CHtml::link('rsvp.me', array('/site/index'));
    }?>

  </h1>
  <?= CHtml::link('Create Event', array('/event/create'), array('class' => 'login-text fright')); ?>
  <div class="clear"></div>
</div>