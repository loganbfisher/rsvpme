<div id="page-container">
	<?php
	$this->breadcrumbs=array(
		'Users'=>array('index'),
		$model->username,
	);

	$this->menu=array(
		array('label'=>'Update users', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Manage users', 'url'=>array('admin')),
	);
	?>

	<h1><?= $is_owner ? 'Your' : $model->username."'s"; ?> Profile</h1>

	<?php $this->renderPartial('_view', array('data'=>$model, 'is_owner'=>$is_owner,  'are_we_friends'=>$are_we_friends)); ?>

	<?php $this->widget('application.components.StFriendsList', array('user_id'=>$model->id, 'username'=>$model->username,)); ?>


</div>
