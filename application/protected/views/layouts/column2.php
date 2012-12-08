<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

	<div id="content-2-col" class="clearfix">
		<?php echo $content; ?>

          <div id="sidebar">
          <?php
                  $this->beginWidget('zii.widgets.CPortlet', array(
                          'title'=>'Operations',
                  ));
                  $this->widget('zii.widgets.CMenu', array(
                          'items'=>$this->menu,
                          'htmlOptions'=>array('class'=>'operations'),
                  ));
                  $this->endWidget();
          ?>
          </div><!-- sidebar -->
	</div><!-- content -->



<?php $this->endContent(); ?>