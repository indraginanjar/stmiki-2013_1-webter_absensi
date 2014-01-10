<?php
/* @var $this HariController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hari',
);

$this->menu=array(
	array('label'=>'Create Hari', 'url'=>array('create')),
	array('label'=>'Manage Hari', 'url'=>array('admin')),
);
?>

<h1>Hari</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
