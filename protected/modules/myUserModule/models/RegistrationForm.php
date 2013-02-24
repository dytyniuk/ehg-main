<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{
	public $login;
	public $email;
	public $password;
	public $password_again;
	
	public $verifyCode;
	/**
	 * Declares the validation rules.
	 * The rules state that login and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// login and password are required
			array('login, email, password, password_again', 'required'),
			array('login, email','unique', 'attributeName'=>'login', 'className'=>'User'),
			array('password_again', 'compare','compareAttribute'=>'password'),
			array('email','email', 'checkMX'=>true),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'insert'),
			
			
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'login'=>'login',
		);
	}

	

	/**
	 * Logs in the user using the given login and password in the model.
	 * @return boolean whether login is successful
	 */
	public function registration()
	{
		$user = new User();

		$user->login = $this->login;
		$user->email = $this->email;
		$user->passwd = $this->password;
		$user->role = $user->roles['user'];

		if( $user->registration() ){
			
			$mailObj = new MyMailer('robot');
			$mailObj->sentActivationMail($user->email, $user->verification_code);
			
			return true;
		}else{
			return false;
		}
	}

}
