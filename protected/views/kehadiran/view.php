<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */

$this->breadcrumbs=array(
	'Kehadirans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kehadiran', 'url'=>array('index')),
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'Update Kehadiran', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kehadiran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
);
?>

<h1>View Kehadiran #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'perkuliahan_id',
		'mahasiswa_id',
		'masuk',
		'keluar',
	),
)); ?>
