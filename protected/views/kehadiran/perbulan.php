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

<h1>Kehadiran Perbulan</h1>
<div class="form">
<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'perkuliahan-form',
	'method'=>'get',
		)
	);
?>
	<div class="row">
		<?php echo $form->label($model,'matakuliah_nama'); ?>
		<?php //echo $form->textField($model,'matakuliah_nama'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$model,
				'attribute'=>'matakuliah_nama',
			    	'name'=> get_class($model).'[matakuliah_nama]',
			    	'source'=>$this->createUrl('matakuliah/jsonNamaAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
		<?php echo $form->error($model,'matakuliah_nama'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'tahun_bulan'); ?>
		<?php //echo $form->textField($model,'tahun_bulan', array('placeholder'=>'yyyy-M')); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tahun_bulan',
			'language' => 'id',
			'options'=>array(
				'dateFormat' => 'yy-mm',
				'showOtherMonths' =>true,
				'selectOtherMonths' =>true,
				),
			'htmlOptions' => array(
				//'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
				'placeholder' => 'yyyy-MM',
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
		'number:number',
		'tahun_bulan',
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
			'filter'=>CHtml::activeTextField($model, 'perkuliahan_selesai'),
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
