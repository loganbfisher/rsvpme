<?php
$this->breadcrumbs=array(
	'User Friends'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User_friend', 'url'=>array('index')),
	array('label'=>'Manage User_friend', 'url'=>array('admin')),
);
?>

<h1>Create User_friend</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>