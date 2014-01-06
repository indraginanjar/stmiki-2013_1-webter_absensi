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
		<?php echo $form->label($model,'mahasiswa_id'); ?>
		<?php echo $form->textField($model,'mahasiswa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'masuk'); ?>
		<?php echo $form->textField($model,'masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keluar'); ?>
		<?php echo $form->textField($model,'keluar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->