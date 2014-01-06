<?php
/* @var $this HariController */
/* @var $model Hari */

$this->breadcrumbs=array(
	'Haris'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hari', 'url'=>array('index')),
	array('label'=>'Manage Hari', 'url'=>array('admin')),
);
?>

<h1>Create Hari</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>