<?php
$this->breadcrumbs=array();
$this->menu=array();
?>

<h1><?= $is_owner ? 'Your' : $user->username."'s"; ?> Friends</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData'=>array(
		'is_owner'=>$is_owner,
	),
)); ?>
