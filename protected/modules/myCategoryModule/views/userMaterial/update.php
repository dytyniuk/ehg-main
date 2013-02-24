<?php
/* @var $this UserMaterialController */
/* @var $model UserMaterial */

$this->breadcrumbs=array(
	'User Materials'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserMaterial', 'url'=>array('index')),
	array('label'=>'Create UserMaterial', 'url'=>array('create')),
	array('label'=>'View UserMaterial', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserMaterial', 'url'=>array('admin')),
);
?>

<h1>Update UserMaterial <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>