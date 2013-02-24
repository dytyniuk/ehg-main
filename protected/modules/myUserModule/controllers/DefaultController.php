<?php

class DefaultController extends Controller
{

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}


	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Displays the registration page
	 */
	public function actionRegistration()
	{
		$model=new RegistrationForm('insert');
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
		{
			//print_r($_POST);
			//die;
			$model->setScenario('ajax');
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['RegistrationForm']))
		{
			$model->attributes=$_POST['RegistrationForm']; #######################
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->registration())
				$this->redirect(Yii::app()->user->returnUrl);
		}

		// display the registration form
		$this->render('registration',array('model'=>$model));
	}

	/**
	 * Displays the password recovery page
	 */
	public function actionAskPasswordRecovery()
	{

		$model=new AskPasswordRecoveryForm('insert');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='askPasswordRecovery-form')
		{
			$model->setScenario('ajax');
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if(isset($_POST['AskPasswordRecoveryForm'])){
					$model->attributes=$_POST['AskPasswordRecoveryForm'];
					if($model->validate() && $model->askPasswordRecovery())
						$this->redirect(Yii::app()->homeUrl);
		}
		
		$this->render('askPasswordRecovery',array('model'=>$model));

	}

	/**
	 * Displays the password recovery page
	 */
	public function actionPasswordRecovery()
	{

		$model=new PasswordRecoveryForm('insert');

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='passwordRecovery-form')
		{
			$model->setScenario('ajax');
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if( isset($_GET['vc']) ){
			$record=User::model()->findByAttributes(array('verification_code'=>$_GET['vc']));
			if(isset($record)){
				if(isset($_POST['PasswordRecoveryForm'])){
					$model->attributes=$_POST['PasswordRecoveryForm'];
					$model->verification_code = $_GET['vc'];
					if($model->validate() && $model->passwordRecovery())
						$this->redirect(Yii::app()->homeUrl);
				}
				$this->render('passwordRecovery',array('model'=>$model));
			}
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	* Activate account by GET paramenters
	**/

	public function actionActivation(){
		if( isset($_GET['vc']) ){
			$record=User::model()->findByAttributes(array('verification_code'=>$_GET['vc']));
			if(isset($record))
				$record->activate();
			$this->redirect(Yii::app()->homeUrl);
		}
	}

	/*
	public function actionDynamiccities(){ //should not work without apc !!!IMPORTANT

		if(isset($_POST) && !Yii::app()->user->isGuest){
			
			Yii::import('application.modules.myUserModule.extensions.*');
			$egeo = new EGeoNameService();
			$egeo->username = 'summertime'; // your username

			$oCache = new CacheAPC(86400);
			$city_list = null;

			$country_list = $oCache->getData(Yii::app()->language."_country_list") ;


			if( null === $oCache->getData(Yii::app()->language."_".$_POST['country'].'_city_list') && isset($country_list[$_POST['country']] ) ){
				$egeo->search(array(
					'q'=>$country_list[ $_POST['country'] ]['countryName'], 
					'featureClass'=>'P', 
					'country' => $country_list[ $_POST['country'] ]['countryCode'],
					'maxRows'=>'1000', 
					));
				


				foreach ($egeo->geonames as $key => $value) {
					$city_list[]=$value->countryCode.", ".$value->toponymName;
				}

				if ($oCache->bEnabled) {
					$oCache->setData(Yii::app()->language."_".$_POST['country'].'_city_list',$city_list); // Сохраняем данные в памяти
				}
				
			}else{
				$city_list = $oCache->getData(Yii::app()->language."_".$_POST['country'].'_city_list') ;
			}


			
			echo json_encode($city_list);
				
			
		}

	}
	*/

}

//Yii::app()->language."_".$_POST['country'].'_city_list'