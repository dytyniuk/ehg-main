<?php
	$this->pageTitle=Yii::app()->name . ' - '.Yii::t('main-ui', 'About');
	$model = Material::model()->findByAttributes( array('special_tag'=>'ABOUT_MATERIAL', 'published_'.Yii::app()->language => '1'));
?>


<article>
    <div class="container">
        <?php 
        	if(isset($model)){
        		$model->setLocalProperties();
        	}else{
        		$model = new Material;
        	}
        ?>


        <div class="row-fluid">
            <div class="span9">
                <div class="page-header">
                    <h1><?php echo $model->title; ?></h1>
                </div>
                <?php echo $model->description; ?>
            </div>
            <div class="span3 visible-desktop">
                <div class="contacts">
                    <h1>093 086 28 33</h1>
                    <a href="#" class="btn btn-warning">Замовити дзвінок</a>
                </div>
            </div>
        </div>
    </div>
</article>
