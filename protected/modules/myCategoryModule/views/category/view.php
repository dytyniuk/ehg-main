<?php
/* @var $this CategoryController */
/* @var $model Category */


$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->getTitle(),
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>


<?

	$menu = new CategoryMaterialMenu($model->getTitle());
	$this->widget('zii.widgets.CMenu',array(
			'items'=>$menu->getMenu(),
	));
?>