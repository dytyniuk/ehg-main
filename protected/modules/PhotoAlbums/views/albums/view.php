

<?php

$cs=Yii::app()->getClientScript();
$base_url = Yii::app()->request->baseUrl;

$cs->registerScriptFile($base_url.'/jscripts/lightbox/js/lightbox.js');    
$cs->registerCssFile($base_url.'/jscripts/lightbox/css/lightbox.css');    

$this->breadcrumbs=array(
	Yii::t('main-ui', 'Альбоми')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List', 'url'=>array('index')),
	array('label'=>'Create', 'url'=>array('create')),
	array('label'=>'Update', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Ви впевнені?')),
	
);
?>

<h1>Альбом #<?php echo $model->id; ?></h1>



	

<?php
	$photos = Photos::model()->findAll(array(
		    'condition'=>'album_id=:album_id',
		    'params'=>array(':album_id'=>$model->id),
		));

	foreach ($photos as $key => $value) {
		echo "<div class='img_holder'>";
			echo "<a href=".$base_url.$value->url_b." rel='lightbox[album]' title='".$value->description."'><img src='".$base_url.$value->url_s."'' alt=''/></a>";
		echo "</div>";
	}
	
?>