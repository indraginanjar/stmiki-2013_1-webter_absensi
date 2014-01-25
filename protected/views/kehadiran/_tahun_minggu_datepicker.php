	<div class="row">
		<?php echo $form->label($model,'tahun_minggu'); ?>
		<?php //echo $form->textField($model,'tahun_minggu', array('placeholder'=>'yyyy-WW')); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'id'=> get_class($model).'_tahun_minggu'.$id,
			'model' => $model,
			'attribute' => 'tahun_minggu',
			'language' => 'id',
			'options'=>array(
				'showWeek'=>true,
				'showOtherMonths' =>true,
				'selectOtherMonths' =>true,
				'onSelect'=> 'js:function(dateText, inst) {
					$(this).val( $.datepicker.formatDate("yy-", $(this).datepicker("getDate")) + ("00" + $.datepicker.iso8601Week($(this).datepicker("getDate"))).slice(-2));
					}',
				),
			'htmlOptions' => array(
				//'size' => '20',         // textField size
				'maxlength' => '10',    // textField maxlength
				'placeholder'=>'yyyy-WW',
				),
		));
		?>
	</div>

