<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AskPasswordRecoveryForm extends CFormModel
{
	public $email;
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
			array('email', 'required'),
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
	public function askPasswordRecovery()
	{
		$user = User::model()->findByAttributes(array(
			'email'=>$this->email,
		));

		if(isset($user)){
			$mailObj = new MyMailer('robot');
			$mailObj->sentPasswordRecoveryMail($user->email, $user->verification_code);
		}

	}

}
