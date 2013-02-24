<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('main-ui', 'Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('main-ui', 'Update Profile'),
);

?>

<h1>Update Profile <?php echo $model->id; ?></h1>





<?php

	$baseUrl = Yii::app()->baseUrl;
	$userpic = $model->getUserpic();

?>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span4" style="text-align:center;">
      	
      	<?php echo CHtml::image($baseUrl.$userpic->url_s, $userpic->alt, array('class' => 'cropable'));?>
		
		
    </div>
    <div class="span8">
      <?php echo $this->renderPartial('_profile_form', array('model'=>$model, 'userpic'=> $userpic));?>
      
      <?php
        $album = Albums::model()->find(array(
            'condition'=>'table_name=:table_name and entity_id=:entity_id and special_tag=:special_tag',
            'params'=>array(':table_name'=>'User', ':entity_id'=>$model->id, ':special_tag'=>'userpic'),
        )); 
        $mod = new Photos('search');
        
        $this->widget('bootstrap.widgets.TbThumbnails', array(
          'dataProvider'=>$mod->search($album->id),
          'template'=>"{items}\n{pager}",
          'itemView'=>'_thumb',
        )); 
      ?>
    </div>
  </div>
</div>

