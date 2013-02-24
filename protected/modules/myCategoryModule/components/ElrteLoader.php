<?php
class ElrteLoader{
	
	function __construct($selector){

		Yii::app()->clientScript->registerCoreScript('jquery.ui');   
		$cs=Yii::app()->getClientScript();
		$cs->registerCssFile($cs->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');


		$cs->registerScriptFile(Yii::app()->request->baseUrl.'/jscripts/elrte-1.3/js/elrte.min.js');    
		$cs->registerScriptFile(Yii::app()->request->baseUrl.'/jscripts/elrte-1.3/js/i18n/elrte.ru.js');
		$cs->registerCssFile(Yii::app()->request->baseUrl.'/jscripts/elrte-1.3/css/elrte.min.css');
		$cs->registerCssFile(Yii::app()->request->baseUrl.'/jscripts/elrte-1.3/css/smoothness/jquery-ui-1.8.13.custom.css');

		$cs->registerScript($selector,"jQuery().ready(function() {
		     var opts = {
		         lang         : 'en',    // set your language
		         styleWithCSS : false,
		         height       : 400,
		         toolbar      : 'min' // 'maxi' - расширенная версия тулбара
		     };
		     // create editor
		     jQuery('".$selector."').elrte(opts);

		      // or this way
		      // var editor = new elRTE(document.getElementById('our-element'), opts);
		 });");   

	}    

}
?>