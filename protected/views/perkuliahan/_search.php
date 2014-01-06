<?php
/* @var $this PerkuliahanController */
/* @var $model Perkuliahan */
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
		<?php echo $form->label($model,'pertemuan'); ?>
		<?php echo $form->textField($model,'pertemuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
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