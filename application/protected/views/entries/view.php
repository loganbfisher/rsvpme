<?php
/* @var $this EntriesController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->entry_id,
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->entry_id)),
	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->entry_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>

<h1>View Entry #<?php echo $model->entry_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'entry_id',
		'first_name',
		'last_name',
                'additional_guests',
	),
)); ?>
