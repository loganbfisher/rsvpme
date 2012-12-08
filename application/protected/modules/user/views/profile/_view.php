<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="view clearfix event-list" style="padding: 10px">
    <div style="width: 150px; height: 150px; float: left; background: #ccc;">
      <img src="<?='images/uploads/profile/'.'profile_'. $data->event_photo ;?>" />
    </div>

    <div style="float: left; padding: 0 10px 10px 10px; width: 430px;">
      <h3><?php echo CHtml::encode($data->name); ?></h3>

        <b><?php echo CHtml::encode($data->getAttributeLabel('where')); ?>:</b>
        <b><?php echo CHtml::encode($data->where); ?></b>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('day')); ?>:</b>
        <b><?php echo CHtml::encode($data->day); ?></b>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
        <b><?php echo CHtml::encode($data->time); ?></b>
        <br />
        <div style="padding-top: 10px;"></div>
          <?php echo CHtml::link('View event', array('/event/view', 'id'=>$data->event_id),array('class'=>'default-btn')); ?>
        </div>
    </div>
</div>