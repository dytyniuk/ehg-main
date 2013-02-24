<?php
/* @var $this UserCategoryController */
/* @var $model UserCategory */

$this->breadcrumbs=array(
	'User Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserCategory', 'url'=>array('index')),
	array('label'=>'Manage UserCategory', 'url'=>array('admin')),
);
?>

<h1>Create UserCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>