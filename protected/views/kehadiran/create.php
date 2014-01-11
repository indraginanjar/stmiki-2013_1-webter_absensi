<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */

$this->breadcrumbs=array(
	'Kehadirans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kehadiran', 'url'=>array('index')),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
	array('label'=>'Kehadiran Perbulan', 'url'=>array('perbulan')),
);
?>

<h1>Create Kehadiran</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
