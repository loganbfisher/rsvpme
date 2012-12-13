<div class="view">
	<?=CHtml::link(
		CHtml::image('','', array('class'=>'profile_pic', 'width'=>'32')) . ' ' . $data->friend_user->username,
		array('users/view', 'username'=>$data->friend_user->username)
	);?>
	<?if($is_owner):?>
		<?=CHtml::link('Remove', array('user_friend/delete', 'username'=>$data->friend_user->username));?>
	<?endif;?>
</div>
