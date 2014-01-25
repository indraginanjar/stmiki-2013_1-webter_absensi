	<div class="row">
		<?php echo $form->label($model,'matakuliah_nama'); ?>
		<?php //echo $form->textField($model,'matakuliah_nama'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'id'=> get_class($model).'_matakuliah_nama_'.$id,
				'model'=>$model,
				'attribute'=>'matakuliah_nama',
			    	'name'=> get_class($model).'[matakuliah_nama]',
			    	'source'=>$this->createUrl('matakuliah/jsonNamaAutoComplete'),
			    	// additional javascript options for the autocomplete plugin
			    	//'options'=>array(
				//	'minLength'=>'1',
			    	//),
			    	'htmlOptions'=>array(
					'style'=>'height:20px;',
			    	),
			));
		?>
		<?php echo $form->error($model,'matakuliah_nama'); ?>
	</div>

