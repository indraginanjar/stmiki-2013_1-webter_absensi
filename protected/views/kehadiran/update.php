<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */

$this->breadcrumbs=array(
	'Kehadirans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kehadiran', 'url'=>array('index')),
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'View Kehadiran', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
	array('label'=>'Kehadiran Perbulan', 'url'=>array('perbulan')),
	array('label'=>'Kehadiran Perminggu', 'url'=>array('perminggu')),
);
?>

<h1>Update Kehadiran <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
