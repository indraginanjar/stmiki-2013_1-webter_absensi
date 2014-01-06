<?php
/* @var $this HariController */
/* @var $model Hari */

$this->breadcrumbs=array(
	'Haris'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hari', 'url'=>array('index')),
	array('label'=>'Create Hari', 'url'=>array('create')),
	array('label'=>'View Hari', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hari', 'url'=>array('admin')),
);
?>

<h1>Update Hari <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>