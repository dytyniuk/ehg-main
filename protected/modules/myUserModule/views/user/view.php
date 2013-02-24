<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('main-ui', 'Users')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('main-ui', 'List User'), 'url'=>array('index')),
	array('label'=>Yii::t('main-ui', 'Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui', 'Update User'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('main-ui', 'Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main-ui', 'Manage User'), 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'email',
		'username',
		'passwd',
		'unique_number',
		'verification_code',
		'enabled',
		'role',
		'date_created',
		'date_modified',
	),
)); ?>
