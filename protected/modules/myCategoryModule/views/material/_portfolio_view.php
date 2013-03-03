<?php 
	$data->setLocalProperties(); 
	$photos = $data->getAllPhotos();
?>

<div class="view">

	
	<?php echo '<h4>'.CHtml::encode($data->title).'</h4>'; ?>
	

	<?php 
		if (!empty($photos) ) {
			echo '<ul class="thumbnails">';
			for($i=0; $i<=3 && $i<count($photos); $i++){
				echo '<li class="span3"><a class="thumbnail" href="'.Yii::app()->createUrl('/portfolio/'.$data->id.'_'.$data->title ).'">';
					echo '<div style="overflow: hidden;height: 80px; width :98px; text-align: center;">';
						echo ' <img alt="'.$photos[$i]->alt.'" style="max-width:120px;"  src="'.$photos[$i]->url_s.'">';
					echo '</div>';
				echo '</a></li>';
			}
			echo '</ul>';
		}
	?>

</div>