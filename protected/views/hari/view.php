<?php
/* @var $this HariController */
/* @var $model Hari */

$this->breadcrumbs=array(
	'Haris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Hari', 'url'=>array('index')),
	array('label'=>'Create Hari', 'url'=>array('create')),
	array('label'=>'Update Hari', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Hari', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hari', 'url'=>array('admin')),
);
?>

<h1>View Hari #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
