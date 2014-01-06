<?php
/* @var $this KehadiranController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kehadirans',
);

$this->menu=array(
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
);
?>

<h1>Kehadirans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
