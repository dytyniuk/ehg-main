<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $id
 * @property string $login
 * @property string $email
 * @property string $username
 * @property string $passwd
 * @property string $unique_number
 * @property string $verification_code
 * @property integer $enabled
 * @property string $role
 * @property string $date_created
 * @property string $date_modified
 */
class User extends CActiveRecord
{
	public $roles = array(
		'user' => 'user',
		'administrator' => 'administrator',
	);

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enabled', 'numerical', 'integerOnly'=>true, 'allowEmpty'=>false),
			
			array('email','email', 'checkMX'=>true),
			array('login, email','unique', 'attributeName'=>'login', 'className'=>'User'),

			array('login, email, country , city, username, passwd, unique_number, verification_code, role', 'length', 'max'=>255, 'allowEmpty'=>false),
			array('date_created, date_modified, unique_number, verification_code', 'unsafe'),
			array('enabled, login, email, role', 'unsafe', 'on'=>'update_profile'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, email, username, passwd, unique_number, verification_code, enabled, role, date_created, date_modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'email' => 'Email',
			'username' => 'Username',
			'passwd' => 'Passwd',
			'unique_number' => 'Unique Number',
			'verification_code' => 'Verification Code',
			'enabled' => 'Enabled',
			'role' => 'Role',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('passwd',$this->passwd,true);
		$criteria->compare('unique_number',$this->unique_number,true);
		$criteria->compare('verification_code',$this->verification_code,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
        
        if ($this->isNewRecord){
            $this->unique_number = mt_rand();
            $this->passwd = md5($this->passwd.$this->unique_number);
            $this->date_created = date('Y-m-d H:i:s');
            $this->date_modified = date('Y-m-d H:i:s');
        }else{
	    	$user = User::model()->findByPk($this->id);
	        if($this->passwd != $user->passwd){
	        	$this->unique_number = mt_rand();
	        	$this->passwd = md5($this->passwd.$this->unique_number);
	        }
	        $this->date_modified = date('Y-m-d H:i:s');
	    }

	    $this->verification_code = md5( mt_rand().$this->login )."_".md5( mt_rand().$this->email);

        return parent::beforeSave();
    }

    public function afterSave() {
        
        if ($this->isNewRecord){
            $album = new Albums;
            $album->createAndSaveAlbum();
            $album->table_name = 'User';
            $album->entity_id = $this->id;
            $album->special_tag = 'userpic';

            $album->save();
        }
        return parent::afterSave();
    }

    public function registration(){

	    	$this->username = "";
	    	$this->enabled=0;
	    	$this->role = $this->roles['user'];
	    	$this->date_created = date('Y-m-d H:i:s');
	    	$this->date_modified = date('Y-m-d H:i:s');
	    	
	    	if($this->save()){
	    		return true;
	    	}else{
	    		return false;
	    	}
    }

    public function activate(){
    	$this->enabled = 1;
    	return $this->save();
    }   

    public function deactivate(){
    	$this->enabled = 0;
    	return $this->save();
    }    

    public function getUserpic(){
    	$album = Albums::model()->find(array(
		    'condition'=>'table_name=:table_name and entity_id=:entity_id and special_tag=:special_tag',
		    'params'=>array(':table_name'=>'User', ':entity_id'=>$this->id, ':special_tag'=>'userpic'),
		));


    	if(isset($album)){
    		return $album->getMainPhoto(); 
    	}else{
    		return new Photos; //empty photo
    	}

    }
}