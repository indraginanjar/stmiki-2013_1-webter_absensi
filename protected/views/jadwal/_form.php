<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-form',
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
				'model'=>$model,
				'attribute'=>'matakuliah_id',
			    	'name'=> get_class($model).'[matakuliah_id]',
			    	'source'=>$this->createUrl('matakuliah/jsonAutoComplete'),
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
		<?php echo $form->labelEx($model,'hari_id'); ?>
		<?php //echo $form->textField($model,'hari_id'); ?>
		<?php
			$modelsreg = Hari::model()->findAll(array('select' => array('id', 'nama')));
			$list = CHtml::listData($modelsreg, 'id', 'nama');
			echo CHtml::activedropDownList($model,'hari_id', $list, array('empty' => 'Pilih'));
		?>
		<?php echo $form->error($model,'hari_id'); ?>
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
