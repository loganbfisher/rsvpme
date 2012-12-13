<div class="view">
  <? if(!$are_we_friends): ?>
  <?=$data->username?>
  <img src="/images/uploads/thumbs/asdf_<?=$data->profile_photo?>"/>
  <?= CHtml::link('Add as friend', array('user_friend/create', 'username' => $data->username)); ?>
  <? else: ?>
  <p>You are currently friends with <?=$data->username?></p>
  <? endif; ?>
</div>
