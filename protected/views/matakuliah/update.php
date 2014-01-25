<?php
/* @var $this MatakuliahController */
/* @var $model Matakuliah */

$this->breadcrumbs=array(
	'Matakuliah'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Matakuliah', 'url'=>array('index')),
	array('label'=>'Create Matakuliah', 'url'=>array('create')),
	array('label'=>'View Matakuliah', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Matakuliah', 'url'=>array('admin')),
);
?>

<h1>Update Matakuliah <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
