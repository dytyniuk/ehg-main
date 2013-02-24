<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $_role;

    public function authenticate()
    {
        $record=User::model()->findByAttributes(array(
            'login'=>$this->username,
            'enabled'=>1,
        ));

/** TODO
*   Change error code for enable = 1
**/        
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->passwd!==md5($this->password.$record->unique_number) ) 
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->_role=$record->role;
            // $this->setState('title', $record->title); same as add same session
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }

    
}