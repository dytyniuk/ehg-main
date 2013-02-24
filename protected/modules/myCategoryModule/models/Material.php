<?php

/**
 * This is the model class for table "Material".
 *
 * The followings are the available columns in table 'Material':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $date_created
 * @property string $date_modified
 * @property integer $author_id
 * @property integer $category_id
 */
class Material extends CActiveRecord
{
	public $title;
 	public $description;
 	public $short_description;
 	public $meta_description;
 	public $keywords;
 	public $meta_keywords;
 	public $published;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Material the static model class
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
		return 'Material';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_id, category_id, published_en, published_ru, published_uk', 'numerical', 'integerOnly'=>true),
			array('title_en, title_ru, title_uk, keywords_en, keywords_ru, keywords_uk', 'length', 'max'=>255),
			array('short_description_en, short_description_ru, short_description_uk, description_en, published_en, published_ru, published_uk,  meta_description_en, keywords_en, meta_keywords_en, description_ru, meta_description_ru, keywords_ru, meta_keywords_ru, description_uk, meta_description_uk, keywords_uk, meta_keywords_uk,', 'safe'),
			array('date_created, date_modified, author_id, special_tag, undeleted', 'unsafe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title_en, title_ru, title_uk, date_created, date_modified, author_id, category_id', 'safe', 'on'=>'search'),
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
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'author_id' => 'Author',
			'category_id' => 'Category',
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
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('author_id',$this->author_id);
		

		if(!empty($_GET['category_id'])){
			$cat_id = (int)$_GET['category_id'];
			$criteria->compare('category_id',$cat_id);
		}else{
			$criteria->compare('category_id',$this->category_id);
		}


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
        
        if ($this->isNewRecord){
        	$this->author_id = Yii::app()->user->id;
            $this->date_created = date('Y-m-d H:i:s');
	    	$this->date_modified = date('Y-m-d H:i:s');
	    	$this->undeleted = 0;
        }else{
	    	$this->date_modified = date('Y-m-d H:i:s');
	    }

	    return parent::beforeSave();
    }

    public function getTitle(){
		if(Yii::app()->language == 'en'){
			return $this->title_en;
		}elseif (Yii::app()->language == 'ru') {
			return $this->title_ru;
		}elseif (Yii::app()->language == 'uk') {
			return $this->title_uk;
		}
    }

    

    public function setLocalProperties(){
    	if(Yii::app()->language == 'en'){
			$this->title = $this->title_en;
		 	$this->description = $this->description_en;
		 	$this->short_description = $this->short_description_en;
		 	$this->meta_description = $this->meta_description_en;
		 	$this->keywords = $this->keywords_en;
		 	$this->meta_keywords = $this->meta_keywords_en;
		 	$this->published = $this->published_en;
		}elseif (Yii::app()->language == 'ru') {
			$this->title = $this->title_ru;
			$this->short_description = $this->short_description_ru;
		 	$this->description = $this->description_ru;
		 	$this->meta_description= $this->meta_description_ru;
		 	$this->keywords = $this->keywords_ru;
		 	$this->meta_keywords = $this->meta_keywords_ru;
		 	$this->published = $this->published_ru;
		}elseif (Yii::app()->language == 'uk') {
			$this->title = $this->title_uk;
			$this->short_description = $this->short_description_uk;
		 	$this->description = $this->description_uk;
		 	$this->meta_description= $this->meta_description_uk;
		 	$this->keywords = $this->keywords_uk;
		 	$this->meta_keywords = $this->meta_keywords_uk;
		 	$this->published = $this->published_uk;
		}
    }

    public function getMainPhoto(){
    	$album = Albums::model()->findByAttributes(array('table_name'=>'Material', 'entity_id' => $this->id));
    	if(isset($album)){
    		$photo = Photos::model()->findByPk($album->main_photo_id);
    		if(isset($photo)){
    			return $photo;
    		}else{
    			$photo = new Photos;
    			$photo->url_s = 'css/img/logo.png';
    			$photo->url_o = 'css/img/logo.png';
    			$photo->url_b = 'css/img/logo.png';
    			return $photo;
    		}
    	}

    }

    public function getNotMainPhotos(){
    	$album = Albums::model()->findByAttributes(array('table_name'=>'Material', 'entity_id' => $this->id));
    	if(isset($album)){
    		$photos = Photos::model()->findAll(array(
	        	'condition'=>'id<>:main_photo_id and album_id=:album_id',
	       		'params'=>array(':main_photo_id'=>$album->main_photo_id, ':album_id'=>$album->id),
	   		));

    		if(isset($photos)){
    			return $photos;
    		}else{
    			$photos = array();
    			return $photos;
    		}
    	}
    }

    public function getAllPhotos(){
    	$album = Albums::model()->findByAttributes(array('table_name'=>'Material', 'entity_id' => $this->id));
    	if(isset($album)){
    		$photos = Photos::model()->findAll(array(
	        	'condition'=>'album_id=:album_id',
	       		'params'=>array(':album_id'=>$album->id),
	   		));

    		if(isset($photos)){
    			return $photos;
    		}else{
    			$photos = array();
    			return $photos;
    		}
    	}
    }

    public function getLink(){
    	return Yii::app()->createUrl('/myCategoryModule/material/view/', array('id'=>$this->id."_".$this->title));
    }
}