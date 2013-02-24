<?php

/**
 * This is the model class for table "Albums".
 *
 * The followings are the available columns in table 'Albums':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $date_created
 * @property string $path_on_hdd
 * @property integer $author_id
 * @property integer $entity_id
 * @property string $table_name
 */
class Albums extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Albums the static model class
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
		return 'Albums';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('author_id, entity_id', 'numerical', 'integerOnly'=>true),
			array('title,title, path_on_hdd, table_name', 'length', 'max'=>255),
			array('description', 'safe'),
			array('author_id,  date_created, special_tag', 'unsafe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, date_created, path_on_hdd, author_id', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description' => 'Description',
			'date_created' => 'Date Created',
			'path_on_hdd' => 'Path On Hdd',
			'special_tag' => 'Special Tag',
			'author_id' => 'User',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('path_on_hdd',$this->path_on_hdd,true);
		$criteria->compare('author_id',$this->author_id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	CUSTOM CODE
	*/
	public function createAndSaveAlbum(){ //creates dir and fill path fields

		$album_name = null;

		if(!is_dir(Yii::app()->basePath."/../images/albums")){
			mkdir(Yii::app()->basePath."/../images/albums", 0755);
		}

		while(is_dir(Yii::app()->basePath."/../images/albums/".$album_name)){
			$album_name = md5(uniqid());
		}
		
		//$this->url =Yii::app()->request->baseUrl."/images/albums/".$album_name."/";
		$this->url ="/images/albums/".$album_name."/";
		$this->main_photo_id = 0;
		//$this->path_on_hdd = Yii::app()->basePath."/../images/albums/".$album_name;
		$this->path_on_hdd = "/../images/albums/".$album_name;
		mkdir(Yii::app()->basePath."/../images/albums/".$album_name, 0755);
	}

	public function removeFromHdd(){
		$this->rrmdir(Yii::app()->basePath.$this->path_on_hdd);
	}


	public function rrmdir($dir) {
	   if (is_dir($dir)) {
	     $objects = scandir($dir);
	     foreach ($objects as $object) {
	       if ($object != "." && $object != "..") {
	         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
	       }
	     }
	     reset($objects);
	     rmdir($dir);
	   }
 	}

 	public function addPhoto($image, $title = 'default'){ //$image - instance of CUploadedFile (CUploadedFile::getInstancesByName('files');)
 		$photo = new Photos;
		$photo->title = $title;
		$filename = md5($image->getTempName().$image->size).".jpg";
		$photo->imageResizeAndSave($image, $filename, $this->id);
		$photo->save();
		
		if(empty($this->main_photo_id)){
			$this->main_photo_id = $photo->id;
			return $this->save();
		}else{
			return true;
		}
		
 	}

 	

 	protected function beforeSave(){
	    if($this->isNewRecord){
	        $this->date_created=date('Y-m-d H:i:s');
	        $this->author_id=Yii::app()->user->id;
	    }

	    if(empty($this->title)){
	    	$this->title = 'untitled';
	    }

	    return parent::beforeSave();   
	}

	public function getMainPhoto(){
		$photo = Photos::model()->findByPk($this->main_photo_id);
		if(isset($photo)){
			return $photo;
		}else{
			$base_url = Yii::app()->request->baseUrl;
			
			$photo = new Photos;
			$photo->x1 = 0 ;
			$photo->x2 = Photos::$small_size_array['width'];
			$photo->y1 =  0;
			$photo->y2 = Photos::$small_size_array['height'];
			$photo->width = Photos::$small_size_array['width'];
			$photo->height =  Photos::$small_size_array['height'];
			$photo->url_o = '/css/NO-IMAGE-AVAILABLE.jpg';
			$photo->url_b = '/css/NO-IMAGE-AVAILABLE.jpg';
			$photo->url_s = '/css/NO-IMAGE-AVAILABLE.jpg';
			$photo->album_id = 0;
			return $photo;
		}
	}
	

}