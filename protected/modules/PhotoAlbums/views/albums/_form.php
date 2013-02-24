


<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'albums-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo "Назва </br>";//echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo "Опис </br>";//echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	
	

	<?php
	  $this->widget('CMultiFileUpload', array(
	     'name'=>'files',
	     'accept'=>'jpg|gif|png',
	     'duplicate' => 'Duplicate file!',
   		 'denied' => 'Invalid file type',
	  ));
	?>   

	
	






	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->