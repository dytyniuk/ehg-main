<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete', 'profile', 'editProfile'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if( Yii::app()->user->checkAccess('myUserModule.user.actionView') ){

			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if( Yii::app()->user->checkAccess('myUserModule.user.actionCreate') ){

			$model=new User('create');

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['User']))
			{
				$model->attributes=$_POST['User'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if( Yii::app()->user->checkAccess('myUserModule.user.actionUpdate') ){

			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['User']))
			{
				$model->attributes=$_POST['User'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(  Yii::app()->user->checkAccess('myUserModule.user.actionDelete')  ){

			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(  Yii::app()->user->checkAccess('myUserModule.user.actionIndex') ){

			$dataProvider=new CActiveDataProvider('User');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if( Yii::app()->user->checkAccess('myUserModule.user.actionAdmin')) { 
		
			$model=new User('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['User']))
				$model->attributes=$_GET['User'];

			$this->render('admin',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	/**
	 * Profile
	 */
	public function actionProfile($id)
	{
		if( Yii::app()->user->checkAccess('myUserModule.user.actionProfile')) { 
			$this->render('profile',array(
				'model'=>$this->loadModel($id),
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}

	public function actionEditProfile()
	{
		if( Yii::app()->user->checkAccess('myUserModule.user.actionEditProfile') ){
			$id = Yii::app()->user->id;
			$model=$this->loadModel($id);
			$model->scenario = 'update_profile';
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['User']))
			{
				$model->attributes=$_POST['User'];
				if($model->save()){
					//load album and upload photos
					$album = Albums::model()->find(array(
					    'condition'=>'table_name=:table_name and entity_id=:entity_id and special_tag=:special_tag',
					    'params'=>array(':table_name'=>'User', ':entity_id'=>$model->id, ':special_tag'=>'userpic'),
					));
					$images = CUploadedFile::getInstancesByName('files');
					if(!empty($album)){
						foreach ($images as $image) {
							$album->addPhoto($image);
						}
						//set shifts
						$userpic = $album->getMainPhoto();
						if(!$userpic->isNewRecord){
							$userpic->x1 = $_POST['userpic_x1'];
							$userpic->x2 = $_POST['userpic_x2'];
							$userpic->y1 = $_POST['userpic_y1'];
							$userpic->y2 = $_POST['userpic_y2'];
							$userpic->width = $_POST['userpic_width'];
							$userpic->height = $_POST['userpic_height'];
							$userpic->save();
						}
						//
					}
					//end upload photo


					$this->redirect(array('editProfile','id'=>$model->id));
				}
			}

			$this->render('edit_profile',array(
				'model'=>$model,
			));
		}else{
			throw new CHttpException(401,'Unauthorized');
		}
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
