<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'perkuliahan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'matakuliah_id'); ?>
		<?php //echo $form->textField($model,'matakuliah_id'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
			    	'name'=> get_class($model).'[matakuliah_id]',
			    	//'model' => 'perkuliahan', //get_class($model),
				//'attribute' => array('matakuliah_id'),
			    	'sourceUrl'=>$this->createUrl('matakuliah/jsonAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
		<?php echo $form->error($model,'matakuliah_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pertemuan'); ?>
		<?php echo $form->textField($model,'pertemuan'); ?>
		<?php echo $form->error($model,'pertemuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php // echo $form->textField($model,'tanggal'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'tanggal',
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
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mulai'); ?>
		<?php echo $form->textField($model,'mulai', array('placeholder'=>'hh:mm')); ?>
		<?php echo $form->error($model,'mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'selesai'); ?>
		<?php echo $form->textField($model,'selesai', array('placeholder'=>'hh:mm')); ?>
		<?php echo $form->error($model,'selesai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
