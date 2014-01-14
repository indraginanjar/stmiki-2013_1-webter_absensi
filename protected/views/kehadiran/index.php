<?php
/* @var $this KehadiranController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kehadiran',
);

$this->menu=array(
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
	array('label'=>'Kehadiran Perbulan', 'url'=>array('perbulan')),
	array('label'=>'Kehadiran Perminggu', 'url'=>array('perminggu')),
);
?>

<h1>Kehadiran</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
