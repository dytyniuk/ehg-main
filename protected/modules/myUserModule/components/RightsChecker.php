<?php
class RightsChecker{

	protected $operation;
	protected $params;
	protected $role;
	protected $id;

	
	function __construct($operation, $id, $role, $params){
		$this->operation = $operation;
		$this->role = $role;
		$this->params = $params;
		$this->id = $id;
	}

	public function check() {

		/**
		*	myUser module
		**/
		if( $this->operation == 'myUserModule.user.actionView' ) {
			return false; //
		}
		if( $this->operation == 'myUserModule.user.actionCreate' ) {
			return false; //
		}
		if( $this->operation == 'myUserModule.user.actionUpdate' ) {
			return false; //
		}
		if( $this->operation ==  'myUserModule.user.actionDelete'  ) {
			return false; //
		}
		if( $this->operation ==  'myUserModule.user.actionIndex' ) {
			return false; //
		}
		if( $this->operation == 'myUserModule.user.actionAdmin')  {
			return false; //
		} 
		if( $this->operation == 'myUserModule.user.actionProfile')  {
			return true; //
		} 
		if( $this->operation == 'myUserModule.user.actionEditProfile' ) {
			return true; //
		}

		/**
		*	End PhotoAlbum module
		**/

		/**
		*	PhotoAlbum module
		**/
		//Albums
		if( $this->operation == 'PhotoAlbum.albums.actionView') {
			return false; //
		}
		if( $this->operation == 'PhotoAlbum.albums.actionCreate' ){
			return false; //
		}
		if( $this->operation == 'PhotoAlbum.albums.actionUpdate' ){
			$item = Albums::model()->findByPk($this->params['album_id']);
			if(isset($item))	
				if($item->author_id != $this->id ){
					return false;
				}
		}
		if( $this->operation == 'PhotoAlbum.albums.actionDelete' ){
			$item = Albums::model()->findByPk($this->params['album_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}
		}
		if( $this->operation == 'PhotoAlbum.albums.actionIndex' ){
			return false; //
		}
		if( $this->operation == 'PhotoAlbum.albums.actionAdmin' ){
			return false; //
		}
		
		//Photos
		if( $this->operation == 'PhotoAlbum.photos.actionView' ){
			return false; //
		}
		if( $this->operation == 'PhotoAlbum.photos.actionCreate' ){
			return false; //
		}	
		if( $this->operation == 'PhotoAlbum.photos.actionUpdate' ){
			$item = Photos::model()->findByPk($this->params['photo_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}
		}	
		if( $this->operation == 'PhotoAlbum.photos.actionDelete' ){
			$item = Photos::model()->findByPk($this->params['photo_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}
		}
		if( $this->operation == 'PhotoAlbum.photos.actionIndex' ){
			return false; //
		}
		if( $this->operation == 'PhotoAlbum.photos.actionAdmin' ){
			return false; //
		}
		if( $this->operation ==  'PhotoAlbum.photos.actionSetAsMainInAlbum' ){
			$item = Photos::model()->findByPk($this->params['photo_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}
		}
		/**
		*	END PhotoAlbum module
		**/

		/**
		*	myCategory module
		**/
		//material
		if( $this->operation ==  'myCategoryModule.material.actionView') {
			return false; //
		}
		if( $this->operation ==  'myCategoryModule.material.actionCreate' ){

			$userCategory = UserCategory::model()->findByAttributes( array('user_id'=>Yii::app()->user->id,'category_id'=>$this->params['category_id']));
			if(empty($userCategory)){
				return false;
			}else{
				return true;
			}
		}
		if( $this->operation ==  'myCategoryModule.material.actionUpdate') {
			$item = Material::model()->findByPk($this->params['material_id']);
			

			
			$userCategory = UserCategory::model()->findByAttributes( array('user_id'=>Yii::app()->user->id,'category_id'=>$item->category_id));
			if(empty($userCategory)){
				return false;
			}else{
				return true;
			}
			

		}
		if( $this->operation ==  'myCategoryModule.material.actionDelete') {
			$item = Material::model()->findByPk($this->params['material_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}
		}
		if( $this->operation ==  'myCategoryModule.material.actionIndex') {
			return false; //
		}
		if( $this->operation == 'myCategoryModule.material.actionAdmin') {

			if(isset($this->params['category_id'])){
				$userCategory = UserCategory::model()->findByAttributes( array('user_id'=>Yii::app()->user->id,'category_id'=>$this->params['category_id']));
				if(empty($userCategory)){
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}

		}

		//category
		if( $this->operation ==  'myCategoryModule.category.actionView' ){
			return false; //
		}		
		if( $this->operation ==  'myCategoryModule.category.actionCreate' ){
			return false; //
		}
		if( $this->operation == 'myCategoryModule.category.actionUpdate'){
			$item = Category::model()->findByPk($this->params['category_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}

		}		
		if( $this->operation == 'myCategoryModule.category.actionDelete'){
			$item = Category::model()->findByPk($this->params['category_id']);
			if(isset($item))
				if($item->author_id != $this->id ){
					return false;
				}
		}
		if( $this->operation == 'myCategoryModule.category.actionIndex'){
			return false; //
		}
		if( $this->operation ==  'myCategoryModule.category.actionAdmin') {
			return false; //
		}

		
		if('myCategoryModule.userCategory.actionView'){
			return false; //		
		}
		if('myCategoryModule.userCategory.actionCreate') {
			return false; //
		}		
		if('myCategoryModule.userCategory.actionUpdate' ){
			return false; //
		}		
		if('myCategoryModule.userCategory.actionDelete'){
			return false; //
		}		
		if('myCategoryModule.userCategory.actionIndex'){
			return false; //		
		}
		if('myCategoryModule.userCategory.actionAdmin'){
			return false; //
		}		






		/**
		*	END myCategory module
		**/

		/**
		*	myTester module
		**/
		if( $this->operation ==  'myTester.answer.actionView'){
			return false; //
		}		
		if( $this->operation ==  'myTester.answer.actionCreate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.answer.actionUpdate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.answer.actionDelete'){
			return false; //
		}		
		if( $this->operation ==  'myTester.answer.actionIndex'){
			return false; //
		}		
		if( $this->operation ==  'myTester.answer.actionAdmin'){
			return false; //
		}		

		if( $this->operation ==  'myTester.questionCategory.actionView'){
			return false; //
		}		
		if( $this->operation ==  'myTester.questionCategory.actionCreate') {
			return false; //
		}		
		if( $this->operation ==  'myTester.questionCategory.actionUpdate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.questionCategory.actionDelete'){
			return false; //
		}		
		if( $this->operation ==  'myTester.questionCategory.actionIndex') {
			return false; //
		}		
		if( $this->operation ==  'myTester.questionCategory.actionAdmin'){
			return false; //
		}		

		if( $this->operation ==  'myTester.question.actionView'){
			return false; //
		}		
		if( $this->operation ==  'myTester.question.actionCreate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.question.actionUpdate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.question.actionDelete'){
			return false; //
		}		
		if( $this->operation ==  'myTester.question.actionIndex'){
			return false; //
		}		
		if( $this->operation ==  'myTester.question.actionAdmin') {
			return false; //
		}		

		if( $this->operation ==  'myTester.test.actionView'){
			return false; //
		}		
		if( $this->operation ==  'myTester.test.actionCreate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.test.actionUpdate'){
			return false; //
		}		
		if( $this->operation ==  'myTester.test.actionDelete'){
			return false; //
		}		
		if( $this->operation ==  'myTester.test.actionIndex' ){
			return true; //
		}		
		if( $this->operation ==  'myTester.test.actionAdmin' ){
			return false; //
		}		
		if( $this->operation ==  'myTester.test.actionChooseLevel'){
			return false; //
		}

		if( $this->operation ==  'myTester.test.actionDoTest' ){
			return true;
		}		
		if( $this->operation ==  'myTester.test.actionCheckTest'){
			$item = Test::model()->findByPk($this->params['test_id']);
			if(isset($item))
				if($item->user_id != $this->id ){
					return false;
				}
		}

		if( $this->operation ==  'myTester.test.actionViewCert') {
			return true;
		}		

		if( $this->operation ==  'myTester.testLevel.actionView'){
			return false; //
		}
		if( $this->operation ==  'myTester.testLevel.actionCreate'){
			return false; //
		}
		if( $this->operation ==  'myTester.testLevel.actionUpdate'){
			return false; //
		}
		if( $this->operation ==  'myTester.testLevel.actionDelete'){
			return false; //
		}
		if( $this->operation ==  'myTester.testLevel.actionIndex'){
			return false; //
		}
		if( $this->operation ==  'myTester.testLevel.actionAdmin'){
			return false; //
		}
		if( $this->operation ==  'myTester.testLevel.actionDynamicLevels'){
			return true;
		}

		if( $this->operation ==  'myTester.testQuestion.actionView'){
			return false; //
		}
		if( $this->operation ==  'myTester.testQuestion.actionCreate'){
			return false; //
		}
		if( $this->operation ==  'myTester.testQuestion.actionUpdate'){
			return false; //
		}
		if( $this->operation ==  'myTester.testQuestion.actionDelete'){
			return false; //
		}
		if( $this->operation ==  'myTester.testQuestion.actionIndex'){
			return false; //
		}
		if( $this->operation ==  'myTester.testQuestion.actionAdmin'){
			return false; //
		}

		/**
		*	END myTester module
		**/

	}


}

?>





		
