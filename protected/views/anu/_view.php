<?php
/* @var $this AnuController */
/* @var $data Anu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fasdf')); ?>:</b>
	<?php echo CHtml::encode($data->fasdf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dsaf')); ?>:</b>
	<?php echo CHtml::encode($data->dsaf); ?>
	<br />


</div>