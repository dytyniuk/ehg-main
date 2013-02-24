<?php
$this->breadcrumbs=array(
	'Albums',
);

$this->menu=array(
	array('label'=>'Create', 'url'=>array('create')),
	//array('label'=>'Manage Albums', 'url'=>array('admin')),
);
?>

<h1>Albums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
