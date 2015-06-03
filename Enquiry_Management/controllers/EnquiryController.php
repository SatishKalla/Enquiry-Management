<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\EnquiryForm;
use app\models\FollowupForm;
use yii\data\ActiveDataProvider;

class EnquiryController extends Controller
{

/*public function actionIndex()
{
	//echo "working";
	$enq= EnquiryForm::find()->all();
	
	return $this->render('enquiryForm',['enq'=>$enq]);
}*/
/* 	public function actionView($id)
    {
        $model = Post::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }*/
	public function actionEnquiry()
	{

		$model = new EnquiryForm();      
	      
		if ($model->load(Yii::$app->request->post()) && $model->validate())
		 {
		 	$req=Yii::$app->request->post();
			$d=$req['EnquiryForm']['date'];
		 	$val=date('Y-m-d H:i:s',strtotime($d));			 	

		 	 $model->date=$val;
		 	 $model->save();
		 	 $this->redirect(['/enquiry/viewlist']);
	    	
		 } 

	    	return $this->render('enquiryForm', [
	        'model' => $model,
	    	]);
	}

	public function actionViewlist(){

		 $dataProvider = new ActiveDataProvider([
            'query' => EnquiryForm::find(),
        ]);

		$mod = new FollowupForm();      
	      
		if ($mod->load(Yii::$app->request->post()) && $mod->validate())
		 {
		 	$req=Yii::$app->request->post();
			$d=$req['FollowupForm']['issueddate'];
		 	$val=date('Y-m-d H:i:s',strtotime($d));			 	

		 	 $mod->date=$val;
		 	 $mod->save();
		 	 $this->redirect(['/enquiry/viewlist']);
	    	
		 } 

		$model = EnquiryForm::find();
			 $pagination = new Pagination([
			 	'defaultPageSize'=>5,
			 	'totalCount'=>$model->count(),
			 	]);

			 $models=$model->offset($pagination->offset)
			 ->limit($pagination->limit)
			 ->all();

		    return $this->render('view', [
		         'models' => $models,
		         'pagination' => $pagination,
		         'mod'=>$mod,
		         'dataProvider'=>$dataProvider,
		    ]); 
	}

	public function actionFollowups()
	{
		$mod = new FollowupForm();      
	      
		if ($mod->load(Yii::$app->request->post()) && $mod->validate())
		 {
		 	$req=Yii::$app->request->post();
			$d=$req['FollowupForm']['issueddate'];
		 	$val=date('Y-m-d H:i:s',strtotime($d));			 	

		 	 $mod->date=$val;
		 	 $mod->save();
		 	 $this->redirect(['/enquiry/viewlist']);
	    	
		 } 

	    	return $this->render('view', [
	        'model' => $mod,
	    	]);
	}
		public function actionFollowuplist(){
			 $dataProvider = new ActiveDataProvider([
            'query' => EnquiryForm::find(),
        ]);

		$mod = FollowupForm::find();
			 $pagination = new Pagination([
			 	'defaultPageSize'=>5,
			 	'totalCount'=>$mod->count(),
			 	]);

			 $models=$mod->offset($pagination->offset)
			 ->limit($pagination->limit)
			 ->all();

		    return $this->render('view', [
		         'models' => $models,
		         'pagination' => $pagination,
		          'dataProvider'=>$dataProvider,
		    ]); 
	}

public function actionView($id)
    {
		 $dataProvider = new ActiveDataProvider([
        'query' => FollowupForm::find()->where(['followupsid'=>$id]),
        ]);

    	$mod= new FollowupForm();

    	$flg = FollowupForm::findOne(['followupsid'=>$id,'status'=>'close']);
    	if($flg == null){
    		$flg = "notclosed";
    	}else{
    		$flg = "closed";
    	}

    	if ($mod->load(Yii::$app->request->post()) && $mod->validate())
		 {
		 	$req=Yii::$app->request->post();					 	
		 	$d=$req['FollowupForm']['issueddate'];
		 	$val=date('Y-m-d H:i:s',strtotime($d));	 	

		 	 $mod->issueddate=$val;
		 	 $mod->followupsid=$id;
		 	 $mod->save();
		 	 //$this->redirect(['/enquiry/view']);
	    	
	    }
        return $this->render('followuplist', [
            'model' => $this->findModel($id),
            'mod'=> $mod,
            'dataProvider'=>$dataProvider,           
            'flg'=>$flg,
        ]);
    }

    /**
     * Creates a new EnquiryForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnquiryForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enquiry_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EnquiryForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enquiry_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EnquiryForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EnquiryForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnquiryForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnquiryForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}