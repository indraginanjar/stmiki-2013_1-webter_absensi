<?php
/* @var $this KehadiranController */
/* @var $data Kehadiran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perkuliahan_id')); ?>:</b>
	<?php echo CHtml::encode($data->perkuliahan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mahasiswa_id')); ?>:</b>
	<?php echo CHtml::encode($data->mahasiswa_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('masuk')); ?>:</b>
	<?php echo CHtml::encode($data->masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keluar')); ?>:</b>
	<?php echo CHtml::encode($data->keluar); ?>
	<br />


</div>