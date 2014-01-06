<?php
/* @var $this AnuController */
/* @var $model Anu */

$this->breadcrumbs=array(
	'Anus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Anu', 'url'=>array('index')),
	array('label'=>'Create Anu', 'url'=>array('create')),
	array('label'=>'View Anu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Anu', 'url'=>array('admin')),
);
?>

<h1>Update Anu <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>