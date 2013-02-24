<li class="span3 " style="margin-left:0px;margin-right:12px">
    	
    	<div class='thumbnail profile_album_photo_shadow'>
	        <div class='photo_list_edit_profile '>
		        <img src="<?php echo Yii::app()->request->baseUrl.$data->url_s; ?>" alt="<?php echo CHtml::encode($data->alt); ?>">
		    </div>
		    
		    <div class="caption" style="text-align:center;">
		                   
		                    <?php $this->widget('bootstrap.widgets.TbButton', array(
							    'label'=>'Set as userpic',
							    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
							    'size'=>'mini', // null, 'large', 'small' or 'mini'
							    'buttonType'=>'button',
							    //'url' => Yii::app()->createUrl("/PhotoAlbums/photos/setAsMainInAlbum", array("id" =>  $data->id) ),
							    'htmlOptions'=>array(
		            				'onClick'=>'js:setAsMain($(this));',
		            				'value' => Yii::app()->createUrl("/PhotoAlbums/photos/setAsMainInAlbum", array("id" =>  $data->id) ),
		            				'style' => 'font-size: 9px;',
		            			),
		        			)); ?>

		        			<?php $this->widget('bootstrap.widgets.TbButton', array(
							    'label'=>'Del',
							    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
							    'size'=>'mini', // null, 'large', 'small' or 'mini'
							    'buttonType'=>'button',
							    //'url' => Yii::app()->createUrl("/PhotoAlbums/photos/setAsMainInAlbum", array("id" =>  $data->id) ),
							    'htmlOptions'=>array(
		            				'onClick'=>'js:deletePhoto($(this));',
		            				'value' => Yii::app()->createUrl("/PhotoAlbums/photos/delete", array("id" =>  $data->id) ),
		            			),
		        			)); ?>
	        </div>
	    </div>
    
</li>