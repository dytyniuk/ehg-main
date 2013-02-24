<?php
/* @var $this UserCategoryController */
/* @var $data UserCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('/myUserModule/user/profile', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode("Login"); ?>:</b>
	<?php
		$user = User::model()->findByPk($data->user_id);

		$baseUrl = Yii::app()->baseUrl;
		$userpic = $user->getUserpic();
		echo CHtml::image($baseUrl.$userpic->url_s, $userpic->alt ); 
		echo CHtml::encode($user->login); 
	?>
	<br />
	
	


	

</div>