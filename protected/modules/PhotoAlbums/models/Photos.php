<?php

/**
 * This is the model class for table "Photos".
 *
 * The followings are the available columns in table 'Photos':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $date_created
 * @property string $path_hdd_o
 * @property string $path_hdd_s
 * @property string $path_hdd_b
 * @property string $url_o
 * @property string $url_s
 * @property string $url_b
 * @property integer $album_id

 */
class Photos extends CActiveRecord
{
	public $image ;
	public static $small_size_array = array('height' =>200 , 'width' => 200); // height width
	public static $big_size_array = array('height' =>500, 'width' =>500); // height width        
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photos the static model class
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
		return 'Photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('album_id', 'numerical', 'integerOnly'=>true),
			array('title,alt, author_id , path_hdd_o, path_hdd_s, path_hdd_b, url_o, url_s, url_b', 'length', 'max'=>255),
			array('description,title', 'safe'),
			array('author_id, date_created, path_hdd_o, path_hdd_s, path_hdd_b, url_o, url_s, url_b, special_tag, x1, x2, y1, y2, width, height ', 'unsafe'),
			array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty' => true), 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, date_created, path_hdd_o, path_hdd_s, path_hdd_b, url_o, url_s, url_b, album_id', 'safe', 'on'=>'search'),
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
			'path_hdd_o' => 'Path Hdd O',
			'path_hdd_s' => 'Path Hdd S',
			'path_hdd_b' => 'Path Hdd B',
			'url_o' => 'Url O',
			'url_s' => 'Url S',
			'url_b' => 'Url B',
			'special_tag' => 'Special Tag',
			'alt' => 'alt',
			'album_id' => 'Album',
			'author_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($o = null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('path_hdd_o',$this->path_hdd_o,true);
		$criteria->compare('path_hdd_s',$this->path_hdd_s,true);
		$criteria->compare('path_hdd_b',$this->path_hdd_b,true);
		$criteria->compare('url_o',$this->url_o,true);
		$criteria->compare('url_s',$this->url_s,true);
		$criteria->compare('url_b',$this->url_b,true);
		if( isset($o) )
			$criteria->addCondition("album_id=$o");


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	CUSTOM CODE
	*/

	public function imageResizeAndSave($instance, $filename, $album_id){

		$base_path = Yii::app()->basePath;
		$album = Albums::model()->findByPk($album_id);

		
		$this->url_o = $album->url.'o_'.$filename;
		$this->url_b = $album->url.'b_'.$filename;
		$this->url_s= $album->url.'s_'.$filename;
		
		$this->path_hdd_o = $album->path_on_hdd.'/o_'.$filename;
		$this->path_hdd_s = $album->path_on_hdd.'/s_'.$filename;
		$this->path_hdd_b = $album->path_on_hdd.'/b_'.$filename;
		
		$this->date_created = date("Y-m-d H:i:s");
		$this->album_id = $album_id;

		$image = new SimpleImage();

		$image->load($instance->getTempName());

		if($image->getWidth() < $image->getHeight()){
			$image->save($base_path.$this->path_hdd_o);  
			$image->resizeToHeight(Photos::$big_size_array['height']);
   			$image->save($base_path.$this->path_hdd_b);
		    $image->resizeToHeight(Photos::$small_size_array['height']);
		    $image->save($base_path.$this->path_hdd_s);   
		}else{
			$image->save($base_path.$this->path_hdd_o);  
			$image->resizeToWidth(Photos::$big_size_array['width']);
   			$image->save($base_path.$this->path_hdd_b);
		    $image->resizeToWidth(Photos::$small_size_array['width']);
		    $image->save($base_path.$this->path_hdd_s);
		}



	}

	public function deletePhotoFromHdd(){
		$base_path = Yii::app()->basePath;
		$original = $base_path.$this->path_hdd_o;
		$big = $base_path.$this->path_hdd_b;
		$small = $base_path.$this->path_hdd_s;

		if(file_exists($original))
			unlink($original);
		if(file_exists($big))
			unlink($big);
		if(file_exists($small))
			unlink($small);
	}

	public function setAsMainInAlbum(){
		$album = Albums::model()->find(array(
			    'condition'=>'id=:id',
			    'params'=>array(':id'=>$this->album_id),
		));
		if(isset($album)){
			$album->main_photo_id = $this->id;
			$album->save();
		}
	}

	protected function beforeSave(){
		
	    if($this->isNewRecord){
			$this->author_id = Yii::app()->user->id;
	    }

	    $this->x1 = (int)$this->x1;
	    $this->x2 = (int)$this->x2;
	    $this->y1 = (int)$this->y1;
	    $this->y2 = (int)$this->y2;

	    if($this->x1<0 or $this->x1>Photos::$small_size_array['width'] )
	    	$this->x1 = 0;

	    if($this->x2<0 or $this->x2>Photos::$small_size_array['width'] )
	    	$this->x2 = Photos::$small_size_array['width'] ;

	    if($this->y1<0 or $this->y1>Photos::$small_size_array['height'] )
	    	$this->y1 = 0;

	    if($this->y2<0 or $this->y2>Photos::$small_size_array['height'] )
	    	$this->y2 = Photos::$small_size_array['height'];

	    return parent::beforeSave();   
	}
}