<?php
/* @var $this EntriesController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->entry_id=>array('view','id'=>$model->entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'View Entry', 'url'=>array('view', 'id'=>$model->entry_id)),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>

<h1>Update Entry <?php echo $model->entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>