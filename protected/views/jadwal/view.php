<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->breadcrumbs=array(
	'Jadwal'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Jadwal', 'url'=>array('index')),
	array('label'=>'Create Jadwal', 'url'=>array('create')),
	array('label'=>'Update Jadwal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Jadwal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jadwal', 'url'=>array('admin')),
);
?>

<h1>View Jadwal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'matakuliah_id',
		'matakuliah.nama:text:Nama Matakuliah',
		'hari_id',
		'hari.nama:text:Nama Hari',
		'mulai',
		'selesai',
	),
)); ?>
