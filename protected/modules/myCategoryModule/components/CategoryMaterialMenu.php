<?php

class CategoryMaterialMenu{
	private $menu ;

	function __construct($title, $special_tag = null){

		$this->menu  = array();
		$parent_category = null;
		
		if($special_tag == null){
			$parent_category = Category::model()->findByAttributes(array('title_'.Yii::app()->language => $title, 'published_'.Yii::app()->language => 1));
		}else{
			$parent_category = Category::model()->findByAttributes(array('special_tag' => $special_tag, 'published_'.Yii::app()->language => 1));
		}

		

		if(isset($parent_category)){
			$categories = Category::model()->findAllByAttributes(array('parent_category_id' => $parent_category->id, 'published_'.Yii::app()->language => 1));
			foreach ($categories as $key => $value) {
				$value->setLocalProperties();
				$this->menu[] = array('label'=>$value->title, 'url'=>$value->getLink());
			}
			$materials = Material::model()->findAllByAttributes(array('category_id' => $parent_category->id, 'published_'.Yii::app()->language => 1));
			foreach ($materials as $key => $value) {
				$value->setLocalProperties();
				$this->menu[] = array('label'=>$value->title, 'url'=>$value->getLink());
			}
		}
	}

	public function getMenu()
	{
		return $this->menu;
	}
}


?>