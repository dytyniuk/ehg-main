<?php
	echo CHtml::openTag('div', array('class' => 'l_head_line'));
		echo CHtml::openTag('div', array('class' => 'r_head_line'));
			echo CHtml::openTag('div', array('class' => 'head_line'));
				echo "Фото";
			echo CHtml::closeTag('div');
		echo CHtml::closeTag('div');
	echo CHtml::closeTag('div');
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo "Назва </br>";//echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alt'); ?>
		<?php echo $form->textField($model,'alt',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alt'); ?>
	</div>

	<div class="row">
		<?php echo "Опис </br>";//echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->