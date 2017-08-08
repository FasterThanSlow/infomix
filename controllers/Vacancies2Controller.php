<?php

namespace app\controllers;

use Yii;
use app\models\Vacancies;
use app\models\VacanciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Vacancies2Controller implements the CRUD actions for Vacancies model.
 */
class Vacancies2Controller extends AppController
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
     * Lists all Vacancies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VacanciesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vacancies model.
     * @param string $id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $organizations_id
     * @param string $statuses_id
     * @param string $members_id
     * @param string $cities_id
     * @return mixed
     */
    public function actionView($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id),
        ]);
    }

    /**
     * Creates a new Vacancies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vacancies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id, 'cities_id' => $model->cities_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Vacancies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $organizations_id
     * @param string $statuses_id
     * @param string $members_id
     * @param string $cities_id
     * @return mixed
     */
    public function actionUpdate($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id)
    {
        $model = $this->findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id, 'cities_id' => $model->cities_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Vacancies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $organizations_id
     * @param string $statuses_id
     * @param string $members_id
     * @param string $cities_id
     * @return mixed
     */
    public function actionDelete($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id)
    {
        $this->findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vacancies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $expiriencies_id
     * @param string $education_id
     * @param string $organizations_id
     * @param string $statuses_id
     * @param string $members_id
     * @param string $cities_id
     * @return Vacancies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id, $cities_id)
    {
        if (($model = Vacancies::findOne(['id' => $id, 'expiriencies_id' => $expiriencies_id, 'education_id' => $education_id, 'organizations_id' => $organizations_id, 'statuses_id' => $statuses_id, 'members_id' => $members_id, 'cities_id' => $cities_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
