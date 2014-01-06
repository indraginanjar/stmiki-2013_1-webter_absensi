<?php
/* @var $this AnuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Anus',
);

$this->menu=array(
	array('label'=>'Create Anu', 'url'=>array('create')),
	array('label'=>'Manage Anu', 'url'=>array('admin')),
);
?>

<h1>Anus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
