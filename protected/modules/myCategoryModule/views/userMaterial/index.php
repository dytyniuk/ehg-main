<?php
/* @var $this UserMaterialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Materials',
);

$this->menu=array(
	array('label'=>'Create UserMaterial', 'url'=>array('create')),
	array('label'=>'Manage UserMaterial', 'url'=>array('admin')),
);
?>

<h1>User Materials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
