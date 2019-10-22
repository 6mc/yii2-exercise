<?php

namespace app\controllers;

use Yii;
use app\models\Loan;
use app\models\LoanSearch;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoanController implements the CRUD actions for Loan model.
 */
class LoanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Loan models.
     * @return mixed
     */
    

    public function actionIndex()
    {
             $searchModel = new LoanSearch();
        $sdataProvider = $searchModel->search(Yii::$app->request->queryParams);



        $dataProvider = new ActiveDataProvider([
            'query' => Loan::find(),
            'pagination' => [ 'pageSize' => 10 ],
            'sort'=> ['defaultOrder' => ['id'=>SORT_ASC]]
        ]);

        
    $pages = new Pagination(['totalCount' => 70, 'pageSize' => 10]);

        $total= Loan::total();
        return $this->render('index', [
            'dataProvider' => $sdataProvider ,
            'searchModel' => $searchModel,
            'pages' => $pages,
            'total' => $total
         ]);
    }

    /**
     * Displays a single Loan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Loan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loan();
        
        if ($model->load(Yii::$app->request->post())&& $model->validate() && \app\models\User::find()->where(['id'=>$model->user_id])->one()->age()>18) {
        
           
            $model->save();
           return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


        public function actionDeactivate()
    {
        
 return $this->render('create', [
            'model' => $model,
        ]);
            }

    /**
     * Updates an existing Loan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Loan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Loan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Loan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Loan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
