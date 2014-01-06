<?php
/* @var $this AnuController */
/* @var $model Anu */

$this->breadcrumbs=array(
	'Anus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Anu', 'url'=>array('index')),
	array('label'=>'Create Anu', 'url'=>array('create')),
	array('label'=>'Update Anu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Anu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Anu', 'url'=>array('admin')),
);
?>

<h1>View Anu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fasdf',
		'dsaf',
	),
)); ?>
