<?php
	$model->setLocalProperties();
	if($model->published){
        $main_photo = $model->getMainPhoto();
        $photos = $model->getNotMainPhotos();

?>
<div class="span9">
    <div class="page-header">
        <h1><?php echo $model->title; ?></h1>
    </div>
    <?php
        echo '<ul class="thumbnails">';
        
        if (!empty($main_photo) ) {
            
            echo '<li><a class="thumbnail" href="'.$main_photo->url_o.'" rel="lightbox[roadtrip]" >';
                echo '<div style="overflow: hidden;height: 80px; width :98px; text-align: center;">';
                    echo ' <img alt="'.$main_photo->alt.'" style="max-width:120px;"  src="'.$main_photo->url_s.'">';
                echo '</div>';
            echo '</a></li>';
            
        }


        if (!empty($photos) ) {
            
            for($i=0; $i<=3 && $i<count($photos); $i++){
                echo '<li ><a class="thumbnail" href="'.$photos[$i]->url_o.'" rel="lightbox[roadtrip]" >';
                    echo '<div style="overflow: hidden;height: 80px; width :98px; text-align: center;">';
                        echo ' <img alt="'.$photos[$i]->alt.'" style="max-width:120px;"  src="'.$photos[$i]->url_s.'">';
                    echo '</div>';
                echo '</a></li>';
            }
        }

        echo '<ul>';
    ?>
    <?php echo $model->description; ?>
</div>
<?php 
	}else{
        echo "<h1>".Yii::t('main-ui', 'Sorry. This material is not published yet.')."</h1>";
	}
?>
<div class="span3 visible-desktop">
    <div class="contacts">
        <h1>093 086 28 33</h1>
        <a href="#" class="btn btn-warning"><?php echo Yii::t('main-ui', 'Order call'); ?></a>
    </div>
</div>