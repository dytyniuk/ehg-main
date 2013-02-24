<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('main-ui', 'Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('main-ui', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main-ui', 'List User'), 'url'=>array('index')),
	array('label'=>Yii::t('main-ui', 'Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui', 'View User'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('main-ui', 'Manage User'), 'url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>