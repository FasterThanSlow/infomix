<?php

namespace app\controllers;

use Yii;
use app\models\Vacancies;
use app\models\VacanciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VacanciesController implements the CRUD actions for Vacancies model.
 */
class VacanciesController extends Controller
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
        $query = clone $dataProvider->query;
        
        $salaries = [
            [ 'title' => 'От 400 руб.', 'value' => '400'],
            [ 'title' => 'От 500 руб.', 'value' => '500'],
            [ 'title' => 'От 600 руб.', 'value' => '600'],
            [ 'title' => 'От 800 руб.', 'value' => '800'],
            [ 'title' => 'От 1000 руб.', 'value' => '1000'],
            [ 'title' => 'Не указана', 'value' => 'null'],
        ];
        
        
        $salaryFilter = [];
        
        foreach ($salaries as $salary){
            if($salary['value'] == 'null'){
                $count = $query->select(['COUNT(*) AS count'])->where(['is','salary', NULL ])->asArray()->count();
            }
            else{
                $count = $query->select(['COUNT(*) AS count'])->where(['>=','salary', $salary['value'] ])->asArray()->count();
            }
            
            if($count != 0){
                $salaryFilter[] = [
                    'title' => $salary['title'], 
                    'value' => $salary['value'], 
                    'count' => $count
                ];
            }
            
        }
              
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'salaryFilter' => $salaryFilter
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
     * @return mixed
     */
    public function actionView($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id),
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
            return $this->redirect(['view', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id]);
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
     * @return mixed
     */
    public function actionUpdate($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id)
    {
        $model = $this->findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id]);
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
     * @return mixed
     */
    public function actionDelete($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id)
    {
        $this->findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id)->delete();

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
     * @return Vacancies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $expiriencies_id, $education_id, $organizations_id, $statuses_id, $members_id)
    {
        if (($model = Vacancies::findOne(['id' => $id, 'expiriencies_id' => $expiriencies_id, 'education_id' => $education_id, 'organizations_id' => $organizations_id, 'statuses_id' => $statuses_id, 'members_id' => $members_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
