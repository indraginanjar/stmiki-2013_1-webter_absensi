	<div class="row">
		<?php echo $form->label($model,'tahun_bulan'); ?>
		<?php //echo $form->textField($model,'tahun_bulan', array('placeholder'=>'yyyy-M')); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'id'=> get_class($model).'_tahun_bulan_'.$id,
			'model' => $model,
			'attribute' => 'tahun_bulan',
			'language' => 'id',
			'options'=>array(
				'dateFormat' => 'yy-mm',
				'showOtherMonths' =>true,
				'selectOtherMonths' =>true,
				),
			'htmlOptions' => array(
				//'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
				'placeholder' => 'yyyy-MM',
				),
		));
		?>
	</div>

