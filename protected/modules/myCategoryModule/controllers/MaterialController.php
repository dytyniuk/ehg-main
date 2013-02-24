<?php

class MaterialController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','update','admin','delete'),
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
		
			
		$model = $this->loadModel($id);
		$model->setLocalProperties();	
		Yii::app()->clientScript->registerMetaTag($model->meta_description, 'description');
		Yii::app()->clientScript->registerMetaTag($model->meta_keywords, 'keywords');

		$this->render('view',array(
			'model'=>$model,
		));
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
			$model=new Material;

			if(!empty($_GET['category_id'])){
				$cat_id = (int)$_GET['category_id'];
				$model->category_id = $cat_id;
			}

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Material']))
			{
				$model->attributes=$_POST['Material'];
				if( Yii::app()->user->checkAccess('myCategoryModule.material.actionCreate', array('category_id' => $model->category_id) ) ){	
					if($model->save()){
						//add album and photos
						$album=new Albums;
						$album->createAndSaveAlbum();
						$images = CUploadedFile::getInstancesByName('files');
						$album->table_name = 'Material';
						$album->entity_id = $model->id;
						if($album->save()){
							foreach ($images as $image) {
								$album->addPhoto($image);
							}
						}
						$this->redirect(array('admin','category_id'=>$model->category_id));
					}
				}else{
					throw new CHttpException(401,'Unauthorized');
				}
			}

			$this->render('create',array(
				'model'=>$model,
			));
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if( Yii::app()->user->checkAccess('myCategoryModule.material.actionUpdate', array('material_id' => $id) )){
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Material']))
			{
				$model->attributes=$_POST['Material'];
				if($model->save()){
					//load album and upload photos
					$album = Albums::model()->find(array(
					    'condition'=>'table_name=:table_name and entity_id=:entity_id',
					    'params'=>array(':table_name'=>'Material', ':entity_id'=>$model->id),
					));
					$images = CUploadedFile::getInstancesByName('files');
					$album->table_name = 'Material';
					$album->entity_id = $model->id;
					if(!empty($album)){
						foreach ($images as $image) {
							$album->addPhoto($image);
						}
					}
					//
					$this->redirect(array('admin','category_id'=>$model->category_id));
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
		if( Yii::app()->user->checkAccess('myCategoryModule.material.actionDelete', array('material_id' => $id) )){
			
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
		
		$dataProvider = null;
		
		if(!empty($_GET['category_id'])){
			$cat_id = (int)$_GET['category_id'];
			$cat = Category::model()->findByPk($cat_id);
			if(!empty($cat)){
				$cat->setLocalProperties();	
				Yii::app()->clientScript->registerMetaTag($cat->meta_description, 'description');
				Yii::app()->clientScript->registerMetaTag($cat->meta_keywords, 'keywords');
			}
			$dataProvider=new CActiveDataProvider('Material',
				array(
			    'criteria'=>array(
			        'condition'=>"category_id=$cat_id and published_".Yii::app()->language."=1",
    			),
    			'pagination'=>array(
                    'pageSize'=>6,
                ),
			));
		}else{
			$dataProvider=new CActiveDataProvider('Material');
		}

		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if( Yii::app()->user->checkAccess('myCategoryModule.material.actionAdmin', array('category_id' => (int)$_GET['category_id'])  )){		
			$model=new Material('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Material']))
				$model->attributes=$_GET['Material'];

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
		$model=Material::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='material-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
