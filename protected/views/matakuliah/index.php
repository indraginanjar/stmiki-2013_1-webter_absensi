<?php
/* @var $this MatakuliahController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Matakuliahs',
);

$this->menu=array(
	array('label'=>'Create Matakuliah', 'url'=>array('create')),
	array('label'=>'Manage Matakuliah', 'url'=>array('admin')),
);
?>

<h1>Matakuliahs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
