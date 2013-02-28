<?php
/* @var $this MaterialController */
/* @var $model Material */
/* @var $form CActiveForm */

//Include jquery ui
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
Yii::app()->clientScript->registerScript('make_tabs','$(function() {
        $( "#tabs" ).tabs();
    });');  
// CHOOSE REDACTOR
//$editor = new ElrteLoader('textarea');
$editor = new TinyMCELoader('textarea');

?>






<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'material-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div id="tabs">
	    <ul>
	        <li><a href="#tabs-1">English</a></li>
	        <li><a href="#tabs-2">Русский</a></li>
	        <li><a href="#tabs-3">Українська</a></li>
	    </ul>
	    <div id="tabs-1">
	        <div class="row">
				<?php echo $form->labelEx($model,'title_en'); ?>
				<?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'title_en'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'description_en'); ?>
				<?php echo $form->textArea($model,'description_en',array( 'rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'description_en'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'short_description_en'); ?>
				<?php echo $form->textArea($model,'short_description_en',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'short_description_en'); ?>
			</div>


			<div class="row">
				<?php echo $form->labelEx($model,'meta_description_en'); ?>
				<?php echo $form->textArea($model,'meta_description_en',array('rows'=>6, 'cols'=>50, 'class'=>'notEditor')); ?>
				<?php echo $form->error($model,'meta_description_en'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'keywords_en'); ?>
				<?php echo $form->textField($model,'keywords_en',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'keywords_en'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'meta_keywords_en'); ?>
				<?php echo $form->textField($model,'meta_keywords_en',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'meta_keywords_en'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'published_en'); ?>
				<?php echo $form->checkBox($model,'published_en',array('uncheckValue'=>'0')); ?>
				<?php echo $form->error($model,'published_en'); ?>
			</div>
	    </div>
	    <div id="tabs-2">
	        <div class="row">
				<?php echo $form->labelEx($model,'title_ru'); ?>
				<?php echo $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'title_ru'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'description_ru'); ?>
				<?php echo $form->textArea($model,'description_ru',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'description_ru'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'short_description_ru'); ?>
				<?php echo $form->textArea($model,'short_description_ru',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'short_description_ru'); ?>
			</div>


			<div class="row">
				<?php echo $form->labelEx($model,'meta_description_ru'); ?>
				<?php echo $form->textArea($model,'meta_description_ru',array('rows'=>6, 'cols'=>50, 'class'=>'notEditor')); ?>
				<?php echo $form->error($model,'meta_description_ru'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'keywords_ru'); ?>
				<?php echo $form->textField($model,'keywords_ru',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'keywords_ru'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'meta_keywords_ru'); ?>
				<?php echo $form->textField($model,'meta_keywords_ru',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'meta_keywords_ru'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'published_ru'); ?>
				<?php echo $form->checkBox($model,'published_ru',array('uncheckValue'=>'0')); ?>
				<?php echo $form->error($model,'published_ru'); ?>
			</div>
	    </div>
	    <div id="tabs-3">
	        <div class="row">
				<?php echo $form->labelEx($model,'title_uk'); ?>
				<?php echo $form->textField($model,'title_uk',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'title_uk'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'description_uk'); ?>
				<?php echo $form->textArea($model,'description_uk',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'description_uk'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'short_description_uk'); ?>
				<?php echo $form->textArea($model,'short_description_uk',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'short_description_uk'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'meta_description_uk'); ?>
				<?php echo $form->textArea($model,'meta_description_uk',array('rows'=>6, 'cols'=>50, 'class'=>'notEditor')); ?>
				<?php echo $form->error($model,'meta_description_uk'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'keywords_uk'); ?>
				<?php echo $form->textField($model,'keywords_uk',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'keywords_uk'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'meta_keywords_uk'); ?>
				<?php echo $form->textField($model,'meta_keywords_uk',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'meta_keywords_uk'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'published_uk'); ?>
				<?php echo $form->checkBox($model,'published_uk',array('uncheckValue'=>'0')); ?>
				<?php echo $form->error($model,'published_uk'); ?>
			</div>
	    </div>
	</div>

	


	<?php //UploadPhoto
	
	$this->widget('CMultiFileUpload', array(
	    'name'=>'files',
	    'accept'=>'jpeg|jpg|gif|png',
	    'duplicate' => 'Duplicate file!',
   		'denied' => 'Invalid file type',
	));

	function addBaseUrlFormater($str){
		return Yii::app()->request->baseUrl.$str;
	}
	
	$album = Albums::model()->find(array(
	    'condition'=>'table_name=:table_name and entity_id=:entity_id',
	    'params'=>array(':table_name'=>'Material', ':entity_id'=>$model->id),
	));
	if(!empty($album)){
		$js_set_as_main ='function() {var url = $(this).attr("href");$.get(url, function(response) {alert(response);});return false;}	';
		$mod = new Photos('search');
		
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'photos-grid',
			'dataProvider'=>$mod->search($album->id),
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
	}
	//end upload photo
	?>   
	


	


	

<?php 
	//if(empty($_GET['category_id'])){ 
	if(false){ 
?>

	<div class="row">
		<?php
			// retrieve the models from db
			$models = Category::model()->findAll();
			// format models as $key=>$value with listData
			$list = array('0' => 'non category');
			$list = $list + CHtml::listData($models,'id', 'title_'.Yii::app()->language) ;
		?>
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',$list); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	
<?php
	}else{
		echo $form->hiddenField($model,'category_id');
	}
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
