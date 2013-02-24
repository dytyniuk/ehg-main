<?php
/* @var $this UserMaterialController */
/* @var $model UserMaterial */

$this->breadcrumbs=array(
	'User Materials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserMaterial', 'url'=>array('index')),
	array('label'=>'Manage UserMaterial', 'url'=>array('admin')),
);
?>

<h1>Create UserMaterial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>