<?php 
	$data->setLocalProperties(); 
	$photo = $data->getMainPhoto();

?>


<div class="span4" style="margin-left:5px;margin-bottom:5px;">
	<a class="thumbnail"  href="<?php echo Yii::app()->createUrl('/partner/'.$data->id.'_'.str_replace(" ", "_",$data->title )); ?>">
	    <img alt="<?php echo $photo->alt; ?>" style="width: 300px; height: 100px;" src=<?php echo $photo->url_s; ?>>
	    <div class="caption">
	        <h4><?php echo  $data->title; ?></h4>
	    </div>
	</a>
</div>
