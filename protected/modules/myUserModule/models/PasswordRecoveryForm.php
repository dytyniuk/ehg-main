<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class PasswordRecoveryForm extends CFormModel
{
	public $email;
	public $password;
	public $password_again;
	public $verification_code;
	
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
			array('email, password, password_again', 'required'),
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
			'email'=>'email',
		);
	}

	

	/**
	 * Logs in the user using the given login and password in the model.
	 * @return boolean whether login is successful
	 */
	public function passwordRecovery()
	{
		$user=User::model()->findByAttributes(array(
			'email'=>$this->email,
			'verification_code'=>$this->verification_code,
		));
		
		if( isset($user) ){
			$user->passwd = $this->password;
			return $user->activate();
		}else{
			return false;
		}
	}

}
