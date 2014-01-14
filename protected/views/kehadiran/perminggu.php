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
	//'method'=>'get',
		)
	);
?>
	<div class="row">
		<?php echo $form->labelEx($model,'tahun_minggu'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'model' => $model,
			//'attribute' => 'bulan_tahun_param',
			'value'=>isset($_POST['tahun_minggu']) ? $_POST['tahun_minggu'] : '',
			'name'=>'tahun_minggu',
			'language' => 'id',
			'options'=>array(
				//`'dateFormat' => 'w-yy',
				//'dateFormat' => 'yy-mm-dd',
				'showWeek'=>true,
				'showOtherMonths' =>true,
				'selectOtherMonths' =>true,
				'onSelect'=> 'js:function(dateText, inst) {
					$(this).val( $.datepicker.formatDate("yy-", $(this).datepicker("getDate")) + $.datepicker.iso8601Week($(this).datepicker("getDate")));
					}',
				),
			'htmlOptions' => array(
				'size' => '20',         // textField size
				'maxlength' => '10',    // textField maxlength
				'val'=>isset($_POST['tahun_minggu']) ? $_POST['tahun_minggu'] : '',
				'placeholder'=>'yyyy-w',
				),
		));
		?>
	</div>
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
		array(
			'header'=>'No.',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		      ),
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
	),
)); ?>
