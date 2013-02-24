<?php

class CategoryController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
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
		if( Yii::app()->user->checkAccess('myCategoryModule.category.actionView', array('category_id' => $id)) ){		
			
			$model = $this->loadModel($id);
			$model->setLocalProperties();	
			Yii::app()->clientScript->registerMetaTag($model->meta_description, 'description');
			Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');
			$this->render('view',array(
				'model'=>$model,
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
		if( Yii::app()->user->checkAccess('myCategoryModule.category.actionCreate') ){		
			$model=new Category;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Category']))
			{

				$model->attributes=$_POST['Category'];
				if($model->save()){
					
					//add album and photos
					$album=new Albums;
					$album->createAndSaveAlbum();
					$images = CUploadedFile::getInstancesByName('files');
					$album->table_name = 'Category';
					$album->entity_id = $model->id;
					
					if($album->save()){
						foreach ($images as $image) {
							$album->addPhoto($image);
						}
					}
					//
					$this->redirect(array('view','id'=>$model->id));
				}
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
		if( Yii::app()->user->checkAccess('myCategoryModule.category.actionUpdate', array('category_id' => $id)) ){		
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Category']))
			{
				$model->attributes=$_POST['Category'];
				if($model->save()){
					//load album and upload photos
					$album = Albums::model()->find(array(
					    'condition'=>'table_name=:table_name and entity_id=:entity_id',
					    'params'=>array(':table_name'=>'Category', ':entity_id'=>$model->id),
					));
					$images = CUploadedFile::getInstancesByName('files');
					$album->table_name = 'Category';
					$album->entity_id = $model->id;
					if(!empty($album)){
						foreach ($images as $image) {
							$album->addPhoto($image);
						}
					}
					//
					$this->redirect(array('view','id'=>$model->id));
				}
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
		if( Yii::app()->user->checkAccess('myCategoryModule.category.actionDelete', array('category_id' => $id)) ){		
			
			$model = $this->loadModel($id);
			if($model->undeleted != 0){
				throw new CHttpException(401,'Unauthorized');
			}else{
				$model->delete();
			}

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
		if( Yii::app()->user->checkAccess('myCategoryModule.category.actionIndex') ){		
			$dataProvider=new CActiveDataProvider('Category');
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
		if( Yii::app()->user->checkAccess('myCategoryModule.category.actionAdmin') ){
			$model=new Category('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Category']))
				$model->attributes=$_GET['Category'];

			$this->render('admin',array(
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
		$model=Category::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
