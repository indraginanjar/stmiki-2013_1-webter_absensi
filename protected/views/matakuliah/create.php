<?php
/* @var $this MatakuliahController */
/* @var $model Matakuliah */

$this->breadcrumbs=array(
	'Matakuliah'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Matakuliah', 'url'=>array('index')),
	array('label'=>'Manage Matakuliah', 'url'=>array('admin')),
);
?>

<h1>Create Matakuliah</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
