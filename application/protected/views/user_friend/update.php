<?php
$this->breadcrumbs=array(
	'User Friends'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User_friend', 'url'=>array('index')),
	array('label'=>'Create User_friend', 'url'=>array('create')),
	array('label'=>'View User_friend', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User_friend', 'url'=>array('admin')),
);
?>

<h1>Update User_friend <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>