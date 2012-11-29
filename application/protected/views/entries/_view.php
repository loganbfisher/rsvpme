<?php
/* @var $this EntriesController */
/* @var $data Entry */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->entry_id), array('view', 'id'=>$data->entry_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('additional_guests')); ?>:</b>
	<?php echo CHtml::encode($data->additional_guests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmation_code')); ?>:</b>
	<?php echo CHtml::encode($data->confirmation_code); ?>
	<br />


</div>