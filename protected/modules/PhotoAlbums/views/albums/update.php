<?php
$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List', 'url'=>array('index')),
	array('label'=>'Create', 'url'=>array('create')),
	array('label'=>'View', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Update Album <?php echo $model->id; ?></h1>



<?php 
	function addBaseUrlFormater($str){
		return Yii::app()->request->baseUrl.$str;
	}
	
	$js_set_as_main ='function() {var url = $(this).attr("href");$.get(url, function(response) {alert(response);});return false;}	';
	$mod = new Photos('search');
	
	
	
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'photos-grid',
		'dataProvider'=>$mod->search($model->id),
		'filter'=>$mod,
		'columns'=>array(
			array(
	        	'type'=>'image',
	        	'value'=> 'addBaseUrlFormater($data->url_s)',
	        ),
			array(
				'class'=>'CButtonColumn',
			    'viewButtonUrl'=>'Yii::app()->createUrl("/PhotoAlbums/photos/view", array("id" => $data["id"]))',
		        'deleteButtonUrl'=>'Yii::app()->createUrl("/PhotoAlbums/photos/delete", array("id" =>  $data["id"]))',
		        'updateButtonUrl'=>'Yii::app()->createUrl("/PhotoAlbums/photos/update", array("id" =>  $data["id"]))',
			),
			array(
			    'class'=>'CButtonColumn',
			    'template'=>'{setAsMain}',
			    'buttons'=>array
			    (
			        'setAsMain' => array
			        (
			            'label'=>'Set as main',
			            'url'=>'Yii::app()->createUrl("/PhotoAlbums/photos/setAsMainInAlbum", array("id" =>  $data["id"]))',
			            'click'=>$js_set_as_main,
			        ),
			    ),
			),
		),
	));


?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>