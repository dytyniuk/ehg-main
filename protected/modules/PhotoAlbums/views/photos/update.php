<?php
$this->breadcrumbs=array(
	'Фото'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Оновити',
);


?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>