<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->event_id)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->event_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>



<h1><?php echo $model->name; ?> | <?= CHtml::link('Edit Event', array('update', 'id'=>$model->event_id), array('class' => '')); ?></h1>
<table class="default">
  <tbody>
    <tr>
      <td class="title">Event Name</td>
      <td><?= $model->name;?></td>
    </tr>
    <tr>
      <td>
        <img src="<?='images/uploads/'. $model->event_photo ;?>" />
      </td>
    </tr>
    <tr>
      <td class="title">Details</td>
      <td><?= $model->details;?></td>
    </tr>
    <tr>
      <td class="title">Where</td>
      <td><?= $model->where;?></td>
    </tr>
    <tr>
      <td class="title">Day</td>
      <td><?= $model->day;?></td>
    </tr>
    <tr>
      <td class="title">Time</td>
      <td><?= $model->time;?></td>
    </tr>
    <tr>
      <td class="title">Guest Message</td>
      <td><?= $model->guest_messsage;?></td>
    </tr>
    <tr>
      <td class="title">Confirmation Code</td>
      <td><?= $model->confirmation_code;?></td>
    </tr>

  </tbody>
</table>

<h1>Guests</h1>
<table class="default">
  <thead>
    <tr>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Additional Guests</td>
    </tr>
    <tbody>
      <? foreach($model->entrys as $key => $value): ?>
      <tr>
        <td><?=Chtml::encode($value['first_name'])?></td>
        <td><?=Chtml::encode($value['last_name'])?></td>
        <td><?=Chtml::encode($value['additional_guests'])?></td>
      </tr>
      <? endforeach ?>
    </tbody>
  </thead>
</table>




