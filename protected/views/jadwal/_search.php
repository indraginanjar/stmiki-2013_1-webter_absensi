<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
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
		<?php echo $form->label($model,'matakuliah_id'); ?>
		<?php echo $form->textField($model,'matakuliah_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hari'); ?>
		<?php echo $form->textArea($model,'hari',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mulai'); ?>
		<?php echo $form->textField($model,'mulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'selesai'); ?>
		<?php echo $form->textField($model,'selesai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->