<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.myUserModule.models.*',
    	'application.modules.myUserModule.components.*',
    	'application.modules.PhotoAlbums.models.*',
    	'application.modules.PhotoAlbums.components.*',
    	'application.modules.myCategoryModule.models.*',
        'application.modules.myCategoryModule.components.*',
	),

	'modules'=>array(
		'myUserModule',
		'PhotoAlbums',
		'myCategoryModule',
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		// uncomment the following to enable URLs in path-format
		'request'=>array(
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=>true,
        ),
		'urlManager'=>array(
			'class'=>'application.modules.myCategoryModule.components.UrlManager',
            'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(



				'<language:(en|ru|uk)>' => '/',
				'looggin'=>'myUserModule/default/login',
				'(ru|uk|en)/partner/<id:[\s\S]+>' => 'myCategoryModule/material/view',
				'(ru|uk|en)/partner' => 'myCategoryModule/material/index/category_id/1',

				'(ru|uk|en)/news/<id:[\s\S]+>' => 'myCategoryModule/material/view',
				'(ru|uk|en)/news' => 'myCategoryModule/material/index/category_id/1',

				'(ru|uk|en)/portfolio/<id:[\s\S]+>' => 'myCategoryModule/material/view',
				'(ru|uk|en)/portfolio' => 'myCategoryModule/material/index/category_id/2',

				'(ru|uk|en)/about' => '/site/page/view/about',




				'(ru|uk|en)/partners' => 'myCategoryModule/material/index/category_id/3',
				'<language:(en|ru|uk)>/<_a>' => '<_a>', 
				'<language:(en|ru|uk)>/<module>/<controller:\w+>/login'=>'<module>/<controller>/login',
                '<language:(en|ru|uk)>/<module>/<controller:\w+>/<action:\w+>/<id:[\s\S]+>'=>'<module>/<controller>/<action>',
                '<language:(en|ru|uk)>/<module>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                '<language:(en|ru|uk)>/</controller><controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<language:(en|ru|uk)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<language:(en|ru|uk)>/<controller:\w+>/<id:[\s\S]+>'=>'<controller>/view',
				'<language:(en|ru|uk)>/(news|partners|portfolio)/<module>/<controller:\w+>/<action:\w+>/<id:[\s\S]+>'=>'<module>/<controller>/<action>',

			),
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=db13.freehost.com.ua;dbname=ehgroup_barhot1',
			'emulatePrepare' => true,
			'username' => 'ehgroup_barhot1',
			'password' => 'Zv9qtJL3J',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'request'=>array(
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=>true,
        ),
        
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'languages'=>array('ru'=>'Ru', 'uk'=>'Ua', 'en'=>'En'),
	),
	'sourceLanguage'=>'en',
	'language'=>'ru',
);
