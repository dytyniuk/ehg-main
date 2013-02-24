<?php
/* @var $this UserCategoryController */
/* @var $model UserCategory */

$this->breadcrumbs=array(
	'User Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserCategory', 'url'=>array('index')),
	array('label'=>'Create UserCategory', 'url'=>array('create')),
	array('label'=>'Update UserCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserCategory', 'url'=>array('admin')),
);
?>

<h1>View UserCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'user_id',
	),
)); ?>
