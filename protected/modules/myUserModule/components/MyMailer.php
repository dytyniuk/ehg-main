<?php

class MyMailer{
	
	
	public $author ;
	public $headers;

	function __construct($author,$mail = 'noreply@yourdomainname.com' ){
		$this->author='=?UTF-8?B?'.base64_encode($author).'?=';
		$this->headers="From: $this->author <{$mail}>\r\n".
		"Reply-To: {$mail}\r\n".
		"MIME-Version: 1.0\r\n".
		"Content-type: text/plain; charset=UTF-8";
	}
	

	public function sentActivationMail($reciver,$code,$subject='Activate account'){

		$body = 'This mail was sent by regitration system. To activate your account please follow the '.Yii::app()->createAbsoluteUrl('/myUserModule/default/activation').'&vc='.$code;
		$subject='=?UTF-8?B?'.base64_encode($subject).'?=';

		mail($reciver,$subject,$body,$this->headers);
	}

	public function sentPasswordRecoveryMail($reciver,$code,$subject='Recovery password'){
		$body = 'This mail was sent by regitration system. To recover your password please follow the '.Yii::app()->createAbsoluteUrl('/myUserModule/default/PasswordRecovery').'&vc='.$code;
		$subject='=?UTF-8?B?'.base64_encode($subject).'?=';

		mail($reciver,$subject,$body,$this->headers);
	}			
}

?>