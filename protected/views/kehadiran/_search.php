<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perkuliahan_id'); ?>
		<?php echo $form->textField($model,'perkuliahan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'matakuliah_id'); ?>
		<?php echo $form->textField($model,'matakuliah_id'); ?>
	</div>

<?php 
$this->renderPartial('_matakuliah_nama_autocomplete',
	array(
		'model'=>$model,
		'form'=>$form,
		'id'=>'search',
	)
);
?>

	<div class="row">
		<?php echo $form->label($model,'perkuliahan_pertemuan'); ?>
		<?php echo $form->textField($model,'perkuliahan_pertemuan'); ?>
	</div>

<?php 
$this->renderPartial('_tahun_bulan_autocomplete',
	array(
		'model'=>$model,
		'form'=>$form,
		'id'=>'search',
	)
);
?>

<?php 
$this->renderPartial('_tahun_minggu_datepicker',
	array(
		'model'=>$model,
		'form'=>$form,
		'id'=>'search',
	)
);
?>

	<div class="row">
		<?php echo $form->label($model,'perkuliahan_tanggal'); ?>
		<?php //echo $form->textField($model,'perkuliahan_tanggal'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'perkuliahan_tanggal',
			'language' => 'id',
			'options'=>array(
				'dateFormat' => 'yy-mm-dd',
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

	<div class="row">
		<?php echo $form->label($model,'perkuliahan_mulai'); ?>
		<?php echo $form->textField($model,'perkuliahan_mulai', array('placeholder'=>'hh:mm')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perkuliahan_selesai'); ?>
		<?php echo $form->textField($model,'perkuliahan_selesai', array('placeholder'=>'hh:mm')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mahasiswa_id'); ?>
		<?php echo $form->textField($model,'mahasiswa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mahasiswa_nim'); ?>
		<?php //echo $form->textField($model,'mahasiswa_nim'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$model,
				'attribute'=>'mahasiswa_nim',
			    	'name'=> get_class($model).'[mahasiswa_nim]',
			    	'source'=>$this->createUrl('mahasiswa/jsonNimAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mahasiswa_nama'); ?>
		<?php //echo $form->textField($model,'mahasiswa_nama'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$model,
				'attribute'=>'mahasiswa_nama',
			    	'name'=> get_class($model).'[mahasiswa_nama]',
			    	'source'=>$this->createUrl('mahasiswa/jsonNamaAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'masuk'); ?>
		<?php echo $form->textField($model,'masuk', array('placeholder'=>'hh:mm')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keluar'); ?>
		<?php echo $form->textField($model,'keluar', array('placeholder'=>'hh:mm')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lama_di_kelas'); ?>
		<?php echo $form->textField($model,'lama_di_kelas', array('placeholder'=>'hh:mm')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
