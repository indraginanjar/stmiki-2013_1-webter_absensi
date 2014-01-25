<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */

$this->breadcrumbs=array(
	'Kehadiran'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kehadiran', 'url'=>array('index')),
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'Kehadiran Perbulan', 'url'=>array('perbulan')),
	array('label'=>'Kehadiran Perminggu', 'url'=>array('perminggu')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kehadiran-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Kehadiran</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kehadiran-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'perkuliahan.matakuliah.nama',
			'header'=>'Matakuliah',
			'filter'=>CHtml::activeTextField($model, 'matakuliah_nama'),
			),
		array(
			'name'=>'perkuliahan.pertemuan',
			//'value'=>'$data->perkuliahan->pertemuan',
			'filter'=>CHtml::activeTextField($model, 'perkuliahan_pertemuan'),
			),
		array(
			'name'=>'perkuliahan.tanggal',
			'filter'=>CHtml::activeTextField($model, 'perkuliahan_tanggal'),
			),
		array(
			'name'=>'perkuliahan.mulai',
			'filter'=>CHtml::activeTextField($model, 'perkuliahan_mulai'),
			),
		array(
			'name'=>'mahasiswa.nim',
			'filter'=>CHtml::activeTextField($model, 'mahasiswa_nim'),
			),
		array(
			'name'=>'mahasiswa.nama',
			'header'=>'Nama',
			'filter'=>CHtml::activeTextField($model, 'mahasiswa_nama'),
			),
		'masuk',
		'keluar',
		array(
			'name'=>'keterangan',
			'header'=>'Keterangan',
			),
		array(
			'name'=>'lama_di_kelas',
			'header'=>'Di kelas',
			),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
