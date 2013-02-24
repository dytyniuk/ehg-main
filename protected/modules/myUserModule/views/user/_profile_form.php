
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

	
	$cs=Yii::app()->getClientScript();
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/jscripts/jquery.imgareaselect.pack.js');
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/jscripts/bootstrap-typeahead.js');     
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/imgareaselect-default.css');
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/jscripts/bootstrap-modal.js');   
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/jscripts/bootbox.js');   

	$cs->registerScript('imgAreaSelect',"
		
		$(document).ready(function () {
		    $('.cropable').imgAreaSelect({
		    	aspectRatio: '1:1',
		    	minHeight:0,
		    	minWidth:0,
		    	maxHeight:200,
		    	maxWidth:200,
		        handles: true,
		        show:true,
		    	x1: {$userpic->x1},
				x2: {$userpic->x2},
				y1: {$userpic->y1},
				y2: {$userpic->y2},
		        onSelectEnd: function (img, selection) {
		        	$('#userpic_x1').val(selection.x1);
		        	$('#userpic_x2').val(selection.x2);
		        	$('#userpic_y1').val(selection.y1);
		        	$('#userpic_y2').val(selection.y2);
		        	$('#userpic_width').val(selection.width);
		        	$('#userpic_height').val(selection.width);
    			}
		    });

			


		});
	",CClientScript::POS_END);


	$cs->registerScript('updateAutoCompleteCityList',"
		
		function updateAutoCompleteCityList(data){
				$('#User_city').removeAttr('disabled');
				$('#User_city').typeahead({source: jQuery.parseJSON(data)}) ; 
		}
	",CClientScript::POS_END);

	$cs->registerScript('setAsMain',"
		
		function setAsMain(pointer){
			bootbox.confirm('Are you sure?', function(result) {
			  	if(result){
				 	var url = pointer.attr('value');
				 	$.get(url,
				 		function(response) {
				 			location.reload();
				 		}
				 	);
					return false;
				}
			}); 
		};	
	",CClientScript::POS_END);

	$cs->registerScript('deletePhoto',"
		
		function deletePhoto(pointer){
			bootbox.confirm('Are you sure?', function(result) {
			  	if(result){
				 	var url = pointer.attr('value');
				 	$.post(url,
				 		function(response) {
				 			location.reload();
				 		}
				 	);
					return false;
				}
			}); 
		};	
	",CClientScript::POS_END);

	

	
///get geo data and cached it
$oCache = new CacheAPC(86400);
$country_list = null;


if( null === $oCache->getData(Yii::app()->language.'_country_list') ){
	
 	Yii::import('application.modules.myUserModule.extensions.*');
	$egeo = new EGeoNameService();
	$egeo->username = 'summertime'; // your username
	$egeo->countryInfo(array('lang' => Yii::app()->language));
	
	foreach ($egeo->geonames as $key => $value) {
		$country_list[(string)$value->geonameId]=array( 'countryName'=>$value->countryName, 'isoNumeric' => $value->isoNumeric, 'countryCode' => $value->countryCode);
	}

	if ($oCache->bEnabled) {
		$oCache->setData(Yii::app()->language.'_country_list', $country_list ); // Сохраняем данные в памяти
	}
	
}else{
	$country_list = $oCache->getData(Yii::app()->language.'_country_list') ;
}

///end cache

?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	

	<?php echo $form->errorSummary($model); ?>




	<div class="row" style='margin-left:0px;'>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row" style='margin-left:0px;'>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row" style='margin-left:0px;'>
		<?php echo $form->labelEx($model,'country'); ?>
		<?php
		$list = array();
		foreach ($country_list as $key => $value) {
		 	$list[$value['countryCode']] = $value['countryName'];
		} 
		echo $form->dropDownList($model,'country',$list, array(
		'empty'=>'Select country',
		
		)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	
	
	

	<?php echo CHtml::hiddenField('userpic_x1'); ?>
	<?php echo CHtml::hiddenField('userpic_x2'); ?>
	<?php echo CHtml::hiddenField('userpic_y1'); ?>
	<?php echo CHtml::hiddenField('userpic_y2'); ?>
	<?php echo CHtml::hiddenField('userpic_width'); ?>
	<?php echo CHtml::hiddenField('userpic_height'); ?>
	

	
	
	<div class="row buttons" style='margin-left:0px;margin-top:30px;margin-bottom:30px;'>
		<?php echo CHtml::submitButton('Upload new Data and Save',array('class'=>'btn')); ?>
	</div>

	
	<div class="row" style='margin-left:0px;'>
	<p class="hint">
		Hint: Here you can add some new profile photo
	</p>
	<?php //UploadPhoto

		$this->widget('CMultiFileUpload', array(
		    'name'=>'files',
		    'accept'=>'jpg|jpeg|gif|png',
		    'duplicate' => 'Duplicate file!',
	   		'denied' => 'Invalid file type',
		));

		?>
 	</div>
	<div id="effect">	
	
	</div>
	


<?php $this->endWidget(); ?>

</div><!-- form -->