<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name=>array('view','id'=>$model->event_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'View Event', 'url'=>array('view', 'id'=>$model->event_id)),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>
<?php //echo $model->name; ?>
<div class="module-wrapper">
  <div class="title-wrapper">
    <h1 class="page-title">Edit</h1>
    <div class="module-container">
      <div class="padding">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
      </div>
    </div>
  </div>
</div>
