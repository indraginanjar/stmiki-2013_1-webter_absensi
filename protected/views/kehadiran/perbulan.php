<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */

$this->breadcrumbs=array(
	'Kehadiran'=>array('index'),
	'Perbulan',
);

$this->menu=array(
	array('label'=>'List Kehadiran', 'url'=>array('index')),
	array('label'=>'Create Kehadiran', 'url'=>array('create')),
	array('label'=>'Manage Kehadiran', 'url'=>array('admin')),
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

<h1>Kehadiran Perbulan</h1>

<form>
	<div class="row">
		<?php echo 'Bulan'; ?>
		<?php // echo $form->textField($model,'tanggal'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'model' => $model,
			//'attribute' => 'tanggal',
			'name'=>'bulan',
			'language' => 'id',
			'options'=>array(
				'dateFormat' => 'mm-yy',
				'showOtherMonths' =>true,
				'selectOtherMonths' =>true,
				),
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
				),
		));
		?>
	</div>
</form>

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
		array(
			'header'=>'No.',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		      ),
		array(
			'name'=>'mahasiswa.nim',
			'filter'=>CHtml::activeTextField($model, 'mahasiswa_nim'),
			),
		array(
			//'name'=>'perkuliahan.matakuliah.nama',
			'name'=>'mahasiswa.nama',
			'filter'=>CHtml::activeTextField($model, 'mahasiswa_nama'),
			),
		'masuk',
		'keluar',
		'lama_di_kelas',
		array(
			'name'=>'keterangan',
			'header'=>'Keterangan',
			),
	),
)); ?>
