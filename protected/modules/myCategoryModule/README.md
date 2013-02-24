myCategoryModule
================

myCategoryModule
	
- Handle category and subcategory
- Handle material relative to category
- TinyMCELoader and ElrteLoader classe to handle WYSIWYG
- Added tabs for form
- need PhotoModule instaled

Instalation :

1. Add to main config
		
		'modules'=>array(
			...
			'myCategoryModule',
			...
		),


2. Add to main config 

		'import'=>array(
			...
			'application.modules.myCategoryModule.models.*',
			'application.modules.myCategoryModule.components.*',
		),		


3. Need that Yii::app()->user->id return Integer

4. Define  Yii::app()->user->checkAccess() - in your own way 

5. Move jscript folder to the root of your project

6. Alter  'components/Controller.php'
	
		<?php
			public function __construct($id,$module=null){
			    parent::__construct($id,$module);
			    // If there is a post-request, redirect the application to the provided url of the selected language 
			    if(isset($_POST['language'])) {
			        $lang = $_POST['language'];
			        $MultilangReturnUrl = $_POST[$lang];
			        $this->redirect($MultilangReturnUrl);
			    }
			    // Set the application language if provided by GET, session or cookie
			    if(isset($_GET['language'])) {
			        Yii::app()->language = $_GET['language'];
			        Yii::app()->user->setState('language', $_GET['language']); 
			        $cookie = new CHttpCookie('language', $_GET['language']);
			        $cookie->expire = time() + (60*60*24*365); // (1 year)
			        Yii::app()->request->cookies['language'] = $cookie; 
			    }
			    else if (Yii::app()->user->hasState('language'))
			        Yii::app()->language = Yii::app()->user->getState('language');
			    else if(isset(Yii::app()->request->cookies['language']))
			        Yii::app()->language = Yii::app()->request->cookies['language']->value;
			}
			public function createMultilanguageReturnUrl($lang='en'){
			    if (count($_GET)>0){
			        $arr = $_GET;
			        $arr['language']= $lang;
			    }
			    else 
			        $arr = array('language'=>$lang);
			    return $this->createUrl('', $arr);
			}
		?>

7. Show widget

		<div  id="language-selector" style="float:right; margin:5px;">
	    	<?php 
	        	$this->widget('application.modules.myCategoryModule.components.widgets.LanguageSelector');
	    	?>
		</div>

8. Edit config 

		<?php
			'components'=>array(
			    ...
			    'request'=>array(
			        'enableCookieValidation'=>true,
			        'enableCsrfValidation'=>true,
			    ),
			    'urlManager'=>array(
			        'class'=>'application.modules.myCategoryModule.components.UrlManager',
			        'urlFormat'=>'path',
			        'showScriptName'=>false,
			        'rules'=>array(
			            '<language:(en|ru|uk)>/<module>/<controller:\w+>/login'=>'<module>/<controller>/login',
			           	'<language:(en|ru|uk)>/<module>/<controller:\w+>/<action:\w+>/<id:[\s\S]+>'=>'<module>/<controller>/<action>',
						'<language:(en|ru|uk)>/<module>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
						'<language:(en|ru|uk)>/</controller><controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
						'<language:(en|ru|uk)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
						'<language:(en|ru|uk)>/<controller:\w+>/<id:[\s\S]+>'=>'<controller>/view',
			        ),
			    ),
			),
			'params'=>array(
			    'languages'=>array('ru'=>'Русский', 'uk'=>'Українська', 'en'=>'English'),
			),
		?>

9. htaccess
		RewriteEngine on

		# if a directory or a file exists, use it directly
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d

		# otherwise forward it to index.php
		RewriteRule . index.php

10. Create "uploaded" folder

*Если язык в строке не указан, тогда мы его ищем в переменной сессии, затем в кукисах, и если до этого пользователь не менял язык то устанавливаем язык приложения по умолчанию. И затем формируем правильную строку URL уже с языком как параметр.


Todo  :

$list = $list + CHtml::listData($models,'id', 'title_'.Yii::app()->language) ; 
fix album-title in controlers
check album module