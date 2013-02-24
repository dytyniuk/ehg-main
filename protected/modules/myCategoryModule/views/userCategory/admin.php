<?php
/* @var $this UserCategoryController */
/* @var $model UserCategory */

$this->breadcrumbs=array(
	'User Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserCategory', 'url'=>array('index')),
	array('label'=>'Create UserCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Categories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'category_id',
		//'user_id',
		array( 'name'=>'user_login_search', 'value'=>'$data->user->login' ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
