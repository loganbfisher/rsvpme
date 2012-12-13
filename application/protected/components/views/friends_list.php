<div class="friends-list">
	<h2><?= $is_owner ? 'Your' : $username."'s"; ?> Friends</h2>

	<?if(!empty($friends)):?>
		<?=CHtml::link('View All Friends', array('/user_friend/index', 'username'=>$username));?>

		<?foreach($friends as $friend):?>
		<div class="friend">
                  <div class="fleft" style="width: 80px; height: 80px; overflow: hidden;">
                  <img src="<?= '/images/uploads/thumbs/' . 'asdf_'. $friend->friend_user->profile_photo; ?>" />
                  </div>
                <?=CHtml::link(

					$friend->friend_user->username,
				array('/users/view', 'username'=>$friend->friend_user->username),
				array('class'=>'fleft')
			);?>

		</div>
		<?endforeach;?>
	<?else:?>
		No friends found.
	<?endif;?>
</div>
