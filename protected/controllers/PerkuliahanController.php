<?php

class PerkuliahanController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create',
					'update',
					'jsonAutoComplete',
					),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Perkuliahan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Perkuliahan']))
		{
			$model->attributes=$_POST['Perkuliahan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Perkuliahan']))
		{
			$model->attributes=$_POST['Perkuliahan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Perkuliahan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Perkuliahan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Perkuliahan']))
			$model->attributes=$_GET['Perkuliahan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Perkuliahan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Perkuliahan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Perkuliahan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='perkuliahan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionJsonAutoComplete($term = null)
	{
/*
		$criteria = new CDbCriteria;
		$criteria->addSearchCondition('id', $term, true);
		$criteria->addSearchCondition('matakuliah.nama', $term, true, 'OR');
		$criteria->limit = 50;
		$collection = Perkuliahan::model()->findAll($criteria);
		$source = array();
		foreach($collection as $item){
			$option = new stdClass();
			$option->label = $item->matakuliah->attributes['nama'] . ' | ' . $item->attributes['id'];
			$option->value = $item->attributes['id'];
			$source[] = $option;
		}
		echo json_encode($source);
*/
		$res =array();

		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ='SELECT tbl_perkuliahan.id, tbl_matakuliah.nama as matakuliah_nama, pertemuan, tanggal, mulai, selesai 
FROM tbl_perkuliahan
left join tbl_matakuliah on tbl_matakuliah.id = tbl_perkuliahan.matakuliah_id
WHERE tbl_perkuliahan.id = :term
or tbl_matakuliah.nama like :term
or pertemuan like :term
or tanggal like :term
or mulai like :term
';
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":term", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryAll();
		}

		//echo CJSON::encode($res);

		$source = array();
		foreach($res as $item){
			$option = new stdClass();
			$option->label = $item['matakuliah_nama'] . ' | #' . $item['pertemuan'] . ' | ' . $item['tanggal'] . ' ' . $item['mulai'] . ' | ' .  $item['id'];
			$option->value = $item['id'];
			$source[] = $option;
		}
		echo json_encode($source);
		Yii::app()->end();
	}
}
