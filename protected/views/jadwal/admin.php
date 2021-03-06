<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->breadcrumbs=array(
	'Jadwal'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Jadwal', 'url'=>array('index')),
	array('label'=>'Create Jadwal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jadwal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jadwal</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	//$this->widget('CGridViewPlus', array(
	 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jadwal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'matakuliah_id',
		//'matakuliah.nama:text:Nama Matakuliah',
		array(
			'name'=>'matakuliah.nama',
			//'value'=>'$data->hari->nama',
			'header'=>'Nama Matakuliah',
			'filter'=>CHtml::activeTextField($model, 'matakuliah_nama'),
			),
		'hari_id',
		//'hari_nama:text:Nama Hari',
		array(
			//'name'=>'hari.nama',
			'value'=>'$data->hari->nama',
			'header'=>'Nama Hari',
			'filter'=>CHtml::activeTextField($model, 'hari_nama'),
			),
		'mulai',
		'selesai',
		array(
			'class'=>'CButtonColumn',
			),
		),
)); ?>
