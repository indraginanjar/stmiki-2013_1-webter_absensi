<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */

$this->breadcrumbs=array(
	'Kehadiran'=>array('index'),
	'Perminggu',
);

$this->menu=array(
	array('label'=>'List Kehadiran', 'url'=>array('index')),
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
	array('label'=>'Kehadiran Perbulan', 'url'=>array('perbulan')),
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

<h1>Kehadiran Perminggu</h1>
<div class="form">
<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'perkuliahan-form',
	'method'=>'get',
		)
	);
?>
<?php 
$this->renderPartial('_tahun_minggu_datepicker',
	array(
		'model'=>$model,
		'form'=>$form,
		'id'=>'perminggu',
	)
);
?>

<?php 
$this->renderPartial('_matakuliah_nama_autocomplete',
	array(
		'model'=>$model,
		'form'=>$form,
		'id'=>'perminggu',
	)
);
?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Set'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>
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
		'number',
		'tahun_minggu',
		array(
			'name'=>'mahasiswa.nim',
			'filter'=>CHtml::activeTextField($model, 'mahasiswa_nim'),
			),
		array(
			//'name'=>'perkuliahan.matakuliah.nama',
			'name'=>'mahasiswa.nama',
			'filter'=>CHtml::activeTextField($model, 'mahasiswa_nama'),
			),
		array(
			'name'=>'perkuliahan.mulai',
			'type'=>'time',
			'filter'=>CHtml::activeTextField($model, 'perkuliahan_mulai'),
			),
		array(
			'name'=>'perkuliahan.selesai',
			'type'=>'time',
			'filter'=>CHtml::activeTextField($model, 'perkuliahan_mulai'),
			),
		'masuk:time',
		'keluar:time',
		'lama_di_kelas',
		array(
			'name'=>'keterangan',
			'header'=>'Keterangan',
			),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
