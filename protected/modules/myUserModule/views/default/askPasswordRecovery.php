<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Ask Password Recovery';
$this->breadcrumbs=array(
	'Ask Password Recovery',
);
?>

<h1>Ask Password Recovery</h1>

<p>Please fill out the following form with your login credentials:</p>
<div class="row-fluid ">
	<div class="form offset4 form_border span4">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'askPasswordRecovery-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>true,
		),
	)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		

		<?php if(CCaptcha::checkRequirements()): ?>
		<div class="row">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<div>
			<?php $this->widget('CCaptcha'); ?>
			</div>
			<div>
			<?php echo $form->textField($model,'verifyCode', array('placeholder'=>"Enter code...") ); ?>
			</div>
			<div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
		<?php endif; ?>

		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Ask Password Recovery'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>