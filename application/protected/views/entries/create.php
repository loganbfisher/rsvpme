<?php
/* @var $this EntriesController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>
<div class="module-wrapper">
  <div class="title-wrapper">
    <h1 class="page-title">RSVP</h1>
    <div class="module-container">
      <div class="padding">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
      </div>
    </div>
  </div>
</div>
