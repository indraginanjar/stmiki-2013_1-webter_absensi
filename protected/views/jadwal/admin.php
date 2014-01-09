<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
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

<h1>Manage Jadwals</h1>

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
	/*
	'columns'=>array(
		array(
			'name'=>'id',
			'headerHtmlOptions'=>array(
					'rowspan'=>2,
					'style'=>'width:92px',
				),
			),
		array(
			'header'=>'Matakuliah',
			'value'=>'',
			'headerHtmlOptions'=>array(
					'colspan'=>2,
				),
			),
		array(
			'name'=>'matakuliah_id',
			'header'=>'ID',
			'headerHtmlOptions'=>array(
					'data-header_row'=>1,
				),
			),
		array(
			'name'=>'matakuliah.nama',
			'header'=>'Nama',
			'headerHtmlOptions'=>array(
					'data-header_row'=>1,
				),
			),
		array(
			'header'=>'Hari',
			'value'=>'',
			'headerHtmlOptions'=>array(
					'colspan'=>2,
				),
			),
		array(
			'name'=>'hari_id',
			'header'=>'ID',
			'headerHtmlOptions'=>array(
					'data-header_row'=>1,
				),
			),
		array(
			'name'=>'hari.nama',
			'header'=>'Nama',
			'headerHtmlOptions'=>array(
					'data-header_row'=>1,
				),
			),
		array(
			'name'=>'mulai',
			'headerHtmlOptions'=>array(
					'rowspan'=>2,
				),
			),
		array(
			'name'=>'selesai',
			'headerHtmlOptions'=>array(
					'rowspan'=>2,
				),
			),
		array(
			'class'=>'CButtonColumn',
			'headerHtmlOptions'=>array(
					'rowspan'=>2,
				),
			),
	),
	'columnPerRow'=>8,
	'headerRow'=>2,
	'addingHeaders' => array(
		array(
			array('text' => 'ID', 'options'=>array('rowspan'=>2)),
			array('text' => 'Matakuliah', 'colspan'=>2),
			array('text' => 'Hari', 'colspan'=>2),
			array('text' => 'Mulai', 'options'=>array('rowspan'=>2)),
			array('text' => 'Selesai', 'options'=>array('rowspan'=>2)),
			array('text' => '', 'options'=>array('rowspan'=>2)),
			),
		array(
			array('text'=>'ID'),
			array('text'=>'Nama'),
			array('text'=>'ID'),
			array('text'=>'Nama'),
			),
		),	
	*/
)); ?>
