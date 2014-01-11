<?php
/* @var $this KehadiranController */
/* @var $model Kehadiran */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kehadiran-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'perkuliahan_id'); ?>
		<?php //echo $form->textField($model,'perkuliahan_id'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$model,
				'attribute'=>'perkuliahan_id',
			    	'name'=> get_class($model).'[perkuliahan_id]',
			    	'source'=>$this->createUrl('perkuliahan/jsonAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
		<?php echo $form->error($model,'perkuliahan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mahasiswa_id'); ?>
		<?php //echo $form->textField($model,'mahasiswa_id'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$model,
				'attribute'=>'mahasiswa_id',
			    	'name'=> get_class($model).'[mahasiswa_id]',
			    	'source'=>$this->createUrl('mahasiswa/jsonAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
		<?php echo $form->error($model,'mahasiswa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'masuk'); ?>
		<?php echo $form->textField($model,'masuk', array('placeholder'=>'hh:mm')); ?>
		<?php echo $form->error($model,'masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keluar'); ?>
		<?php echo $form->textField($model,'keluar', array('placeholder'=>'hh:mm')); ?>
		<?php echo $form->error($model,'keluar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
