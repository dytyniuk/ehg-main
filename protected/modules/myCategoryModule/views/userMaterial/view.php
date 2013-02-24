<?php
/* @var $this UserMaterialController */
/* @var $model UserMaterial */

$this->breadcrumbs=array(
	'User Materials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserMaterial', 'url'=>array('index')),
	array('label'=>'Create UserMaterial', 'url'=>array('create')),
	array('label'=>'Update UserMaterial', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserMaterial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserMaterial', 'url'=>array('admin')),
);
?>

<h1>View UserMaterial #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'material_id',
		'user_id',
	),
)); ?>
