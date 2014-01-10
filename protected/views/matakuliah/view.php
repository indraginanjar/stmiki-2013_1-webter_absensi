<?php
/* @var $this MatakuliahController */
/* @var $model Matakuliah */

$this->breadcrumbs=array(
	'Matakuliah'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Matakuliah', 'url'=>array('index')),
	array('label'=>'Create Matakuliah', 'url'=>array('create')),
	array('label'=>'Update Matakuliah', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Matakuliah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Matakuliah', 'url'=>array('admin')),
);
?>

<h1>View Matakuliah #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
