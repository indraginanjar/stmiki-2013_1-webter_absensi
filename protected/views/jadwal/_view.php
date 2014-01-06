<?php
/* @var $this JadwalController */
/* @var $data Jadwal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matakuliah_id')); ?>:</b>
	<?php echo CHtml::encode($data->matakuliah_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hari')); ?>:</b>
	<?php echo CHtml::encode($data->hari); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mulai')); ?>:</b>
	<?php echo CHtml::encode($data->mulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('selesai')); ?>:</b>
	<?php echo CHtml::encode($data->selesai); ?>
	<br />


</div>