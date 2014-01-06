<?php
/* @var $this AnuController */
/* @var $model Anu */

$this->breadcrumbs=array(
	'Anus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Anu', 'url'=>array('index')),
	array('label'=>'Manage Anu', 'url'=>array('admin')),
);
?>

<h1>Create Anu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>