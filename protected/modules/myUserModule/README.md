myUserModule
============
Last fix:
- moves rep to origin dir
- throws exception in user controller
- changed user form

Simple basic users handling module

- With email confirmation

- With simple RBAC

- Enabled password recovery 

- Require PhotoAlbum module ! IMPORTANT

- Using field login to login

- Using imgAreaSelect

Installation:

1. Download module to protected/modules/myUserModule

2. Use migration

3. Add to main menu

		array('label'=>'Login', 'url'=>array('/myUserModule/default/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'User', 'url'=>array('/myUserModule/user'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'profile', 'url'=>array('/myUserModule/user/profile', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Edit Profile', 'url'=>array('/myUserModule/user/editProfile', ), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Registration', 'url'=>array('/myUserModule/default/registration'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Ask password recovery', 'url'=>array('/myUserModule/default/askPasswordRecovery'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/myUserModule/default/logout'), 'visible'=>!Yii::app()->user->isGuest)



4. Add to config

		'import'=>array(
		    ...
	    
		    'application.modules.myUserModule.models.*',
		    'application.modules.myUserModule.components.*',

		    ...
		),


5. Make sure this class is used by Yii. The config file "protected/config/main.php" must contain:


		'components' => array(
			...
		    'user' => array(
		        'class' => 'WebUser',
		    ),
		    ...
		),

6. Add to config 

		'modules'=>array(
			...
			'myUserModule',
		 	 ... 	
		),

7. Change loginUrl in WebUser.php to your own if needed

8. Remove native UserIdentity and LoginForm

9. Remove actionLogin and actinLogout from native SiteController

10. Move img, flags-iso,css,jscripts to root

11. Install bootstap extension

To DO 
	- add statuses
	- Change error code for enable = 1
	- set users roles
 	- roles unsafe