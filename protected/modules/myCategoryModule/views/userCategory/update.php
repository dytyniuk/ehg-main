<?php
/* @var $this UserCategoryController */
/* @var $model UserCategory */

$this->breadcrumbs=array(
	'User Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCategory', 'url'=>array('index')),
	array('label'=>'Create UserCategory', 'url'=>array('create')),
	array('label'=>'View UserCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserCategory', 'url'=>array('admin')),
);
?>

<h1>Update UserCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>