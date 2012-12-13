<div class="header">
  <h1 class="logo">
   <? if (!Yii::app()->user->isGuest) {
      echo CHtml::link('evite<span class="logo-pad">pad</span>', array('/user/profile'));
    } else {
      echo CHtml::link('evite<span class="logo-pad">pad</span>', array('/site/index'));
    }?>

  </h1>
<script>
  $(document).ready(function(){
    $('.login-options').click(function(){
      $('.authoring-info').slideToggle();
      return false;
    });
  });
</script>
  <?=CHtml::link(CHtml::image('/images/dropdown-arrow.png'), array('#'),array('class'=>'login-options fright','style'=>'padding: 5px 10px; padding-right: 15px; border-left: 1px dotted #666;'))?>
      <? if (!Yii::app()->user->isGuest): ?>
        <?= CHtml::link(CHtml::image('/images/profile-icon.png'), array('/user/profile'),array('class'=>'fright','style'=>'padding: 5px; border-left: 1px dotted #666;')); ?>

    <? endif; ?>
  <?= CHtml::link('Create Event', array('/event/create'), array('class' => 'login-text fright')); ?>

 <div class="authoring-info" style="display: none;">
  <?php
    $this->widget('zii.widgets.CMenu', array(
      'items'=>array(
          array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
          array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
          array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
      ),
  ));
    ?>
 </div>
  <div class="clear"></div>
</div>