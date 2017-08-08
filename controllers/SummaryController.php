<?php

namespace app\controllers;

use Yii;
use app\models\Summary;
use app\models\SummarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SummaryController implements the CRUD actions for Summary model.
 */
class SummaryController extends AppController
{
    /**
     * @inheritdoc
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
     * Lists all Summary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SummarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Summary model.
     * @param string $id
     * @param string $user_id
     * @param string $statuses_id
     * @param string $cities_id
     * @param string $pictures_id
     * @param string $marital_statuses_id
     * @param string $business_trips_id
     * @param string $relocation_id
     * @param string $get_to_work_id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $computer_skills_level_id
     * @return mixed
     */
    public function actionView($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id),
        ]);
    }

    /**
     * Creates a new Summary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Summary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'statuses_id' => $model->statuses_id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id, 'marital_statuses_id' => $model->marital_statuses_id, 'business_trips_id' => $model->business_trips_id, 'relocation_id' => $model->relocation_id, 'get_to_work_id' => $model->get_to_work_id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'computer_skills_level_id' => $model->computer_skills_level_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Summary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $user_id
     * @param string $statuses_id
     * @param string $cities_id
     * @param string $pictures_id
     * @param string $marital_statuses_id
     * @param string $business_trips_id
     * @param string $relocation_id
     * @param string $get_to_work_id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $computer_skills_level_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id)
    {
        $model = $this->findModel($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'statuses_id' => $model->statuses_id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id, 'marital_statuses_id' => $model->marital_statuses_id, 'business_trips_id' => $model->business_trips_id, 'relocation_id' => $model->relocation_id, 'get_to_work_id' => $model->get_to_work_id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'computer_skills_level_id' => $model->computer_skills_level_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Summary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $user_id
     * @param string $statuses_id
     * @param string $cities_id
     * @param string $pictures_id
     * @param string $marital_statuses_id
     * @param string $business_trips_id
     * @param string $relocation_id
     * @param string $get_to_work_id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $computer_skills_level_id
     * @return mixed
     */
    public function actionDelete($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id)
    {
        $this->findModel($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Summary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $user_id
     * @param string $statuses_id
     * @param string $cities_id
     * @param string $pictures_id
     * @param string $marital_statuses_id
     * @param string $business_trips_id
     * @param string $relocation_id
     * @param string $get_to_work_id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $computer_skills_level_id
     * @return Summary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id, $statuses_id, $cities_id, $pictures_id, $marital_statuses_id, $business_trips_id, $relocation_id, $get_to_work_id, $expiriencies_id, $education_id, $computer_skills_level_id)
    {
        if (($model = Summary::findOne(['id' => $id, 'user_id' => $user_id, 'statuses_id' => $statuses_id, 'cities_id' => $cities_id, 'pictures_id' => $pictures_id, 'marital_statuses_id' => $marital_statuses_id, 'business_trips_id' => $business_trips_id, 'relocation_id' => $relocation_id, 'get_to_work_id' => $get_to_work_id, 'expiriencies_id' => $expiriencies_id, 'education_id' => $education_id, 'computer_skills_level_id' => $computer_skills_level_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
