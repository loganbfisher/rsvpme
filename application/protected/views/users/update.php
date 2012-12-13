<div id="page-container">
	<?php
	$this->breadcrumbs=array(
		'Users'=>array('index'),
		$model->username=>array('view','username'=>$model->username),
		'Update',
	);
	
	$this->menu=array();
	?>
	
	<h1>Update Your Profile</h1>
	
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
