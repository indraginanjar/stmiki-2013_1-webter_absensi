<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */

$this->breadcrumbs=array(
	'Perkuliahan'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Perkuliahan', 'url'=>array('index')),
	array('label'=>'Create Perkuliahan', 'url'=>array('create')),
	array('label'=>'Update Perkuliahan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Perkuliahan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Perkuliahan', 'url'=>array('admin')),
);
?>

<h1>View Perkuliahan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'matakuliah_id:number:ID Matakuliah',
		'matakuliah.nama:text:Nama Matakuliah',
		'pertemuan:number',
		'tanggal:date',
		'mulai:time',
		'selesai:time',
	),
)); ?>
