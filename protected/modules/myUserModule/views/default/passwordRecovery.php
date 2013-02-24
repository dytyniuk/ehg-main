<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Password Recovery';
$this->breadcrumbs=array(
	'Password Recovery',
);
?>

<h1>Password Recovery</h1>

<p>Please fill out the following form with your login credentials:</p>
<div class="row-fluid ">
	<div class="form offset4 span4">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'passwordRecovery-form',
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

		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
			<p class="hint">
				Hint: some hint
			</p>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password_again'); ?>
			<?php echo $form->passwordField($model,'password_again'); ?>
			<?php echo $form->error($model,'password_again'); ?>
			<p class="hint">
				Hint: some hint
			</p>
		</div>

		<?php if(CCaptcha::checkRequirements()): ?>
		<div class="row">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode', array('placeholder'=>"Enter code...") ); ?>
			</div>
			<div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
		<?php endif; ?>

		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Password Recovery'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>