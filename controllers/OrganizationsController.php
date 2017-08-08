<?php

namespace app\controllers;

use Yii;
use app\models\Organizations;
use app\models\OrganizationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrganizationsController implements the CRUD actions for Organizations model.
 */
class OrganizationsController extends AppController
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
     * Lists all Organizations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrganizationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Organizations model.
     * @param string $id
     * @param string $cities_id
     * @param string $pictures_id
     * @return mixed
     */
    public function actionView($id, $cities_id, $pictures_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $cities_id, $pictures_id),
        ]);
    }

    /**
     * Creates a new Organizations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organizations();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Organizations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $cities_id
     * @param string $pictures_id
     * @return mixed
     */
    public function actionUpdate($id, $cities_id, $pictures_id)
    {
        $model = $this->findModel($id, $cities_id, $pictures_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Organizations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $cities_id
     * @param string $pictures_id
     * @return mixed
     */
    public function actionDelete($id, $cities_id, $pictures_id)
    {
        $this->findModel($id, $cities_id, $pictures_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Organizations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $cities_id
     * @param string $pictures_id
     * @return Organizations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $cities_id, $pictures_id)
    {
        if (($model = Organizations::findOne(['id' => $id, 'cities_id' => $cities_id, 'pictures_id' => $pictures_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
