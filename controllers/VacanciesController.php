<?php

namespace app\controllers;

use Yii;
use app\models\Vacancies;
use app\models\VacanciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Schedule;
use app\models\Education;
use app\models\Employment;
use app\models\NatureOfWork;
use app\models\Expiriencies;
use app\models\SpecialitiesSection;

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
    public function actionIndex($speciality)
    {
        $searchModel = new VacanciesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $specialitiesSubsections = \app\models\SpecialitiesSubsection::find()->joinWith('specialities',false)->joinWith('specialitiesSection')->where(['specialities.id' => $speciality])->asArray()->all();
        $speciality = \app\models\Specialities::findOne(['id'=>$speciality]);
        
        
        $salariesArr = [
            300 => 'От 300 руб.',
            500 => 'От 500 руб.',
            700 => 'От 700 руб.',
            1200 => 'От 1200 руб.',
            'null' => 'Не указана',
        ];
        
        $salaries = [];
        
        foreach ($salariesArr as $index => $item){
            if($index == 'null'){
                $count = Vacancies::find()->where(['is','salary', NULL ])->asArray()->count();
            }
            else{
                $count = Vacancies::find()->where(['>=','salary', $index ])->asArray()->count();
            }
            
            if($count != 0){
                $salaries[] = [
                    'title' => $item, 
                    'id' => $index, 
                    'count' => $count
                ];
            }
            
            
        }
        
        $schedule = Schedule::find()->select(['schedule.id','schedule.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('schedule.id')->asArray()->all();
        $education = Education::find()->select(['education.id','education.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('education.id')->asArray()->all();
        $employment = Employment::find()->select(['employment.id','employment.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('employment.id')->asArray()->all();
        $natureOfWork  = NatureOfWork::find()->select(['nature_of_work.id','nature_of_work.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('nature_of_work.id')->asArray()->all();
        $expiriencies  = Expiriencies::find()->select(['expiriencies.id','expiriencies.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('expiriencies.id')->asArray()->all();
        $student = Vacancies::find()->select(['COUNT(is_for_student) as count','is_for_student as id',"IF (is_for_student = 1,'Можно','Нет') as title"])->groupBy('vacancies.is_for_student')->asArray()->all();
        
        return $this->render('index', compact([
            'searchModel',
            'dataProvider',
            'schedule',
            'education',
            'employment',
            'natureOfWork',
            'expiriencies',
            'student',
            'salaries',
            'speciality',
            'specialitiesSubsections']));          
    }

    public function actionSpecialitiesSection(){
       $specialitiesSections = SpecialitiesSection::find()->joinWith('specialitiesSubsections')->asArray()->all();
       
       return $this->render('specialities_sections',[
           'specialitiesSections' => $specialitiesSections
       ]);
    }

    public function actionSpecialities($section){
       $specialitySection = \app\models\SpecialitiesSubsection::findOne($section);
       
       $specialities = \app\models\Specialities::find()->joinWith('specialitiesSubsections')->where(['specialities_subsection.id'=>$section])->asArray()->all();
       return $this->render('specialities',[
           'section' => $specialitySection,
           'specialities' => $specialities
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
