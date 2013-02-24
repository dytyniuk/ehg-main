<?php
/* @var $this UserCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Categories',
);

$this->menu=array(
	array('label'=>'Create UserCategory', 'url'=>array('create')),
	array('label'=>'Manage UserCategory', 'url'=>array('admin')),
);
?>

<h1>User Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
