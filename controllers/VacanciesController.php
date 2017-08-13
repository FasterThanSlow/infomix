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
class VacanciesController extends AppController
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
        
        $specialitiesSubsections = \app\models\SpecialitiesSubsection::find()->joinWith('specialities',false)->joinWith('specialitiesSection')->where(['specialities.id' => $searchModel->speciality])->asArray()->all();
        $speciality = \app\models\Specialities::findOne(['id'=>$searchModel->speciality]);
        
        $salaries = self::getSalariesArr();
        $schedule = self::getSchedulesArr();
        $education = self::getEducationArr();
        $employment = self::getEmployments();
        $natureOfWork = self::getNaturesOfWork();
        $expiriencies = self::getExpiriencies();
        $student = self::getStudents();
                
        return $this->render('index', compact(
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
            'specialitiesSubsections'));          
    }
    
    public static function getSalariesArr(){
        $salaries = \app\models\PriceFilters::find()->orderBy(['value'=>SORT_DESC])->all();
        
        $result = [];
        
        foreach ($salaries as $item){
            if($item->value == NULL){
                $item->value = 'null';
                $count = Vacancies::find()->where(['is','salary', NULL ])->asArray()->count();
            }
            else{
                $count = Vacancies::find()->where(['>=','salary', $item->value ])->asArray()->count();
            }
            $result[] = ['title' => $item->title, 'id' => $item->value, 'count' => $count];
        }
        return self::getFormattedProperty($result);
    }
    
    public static function getSchedulesArr(){
        $result = Schedule::find()->select(['schedule.id','schedule.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('schedule.id')->asArray()->all();
        return self::getFormattedProperty($result);
    }
    
    public static function getEducationArr(){
        $result = Education::find()->select(['education.id','education.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('education.id')->asArray()->all();
        return self::getFormattedProperty($result);
    }

    public static function getNaturesOfWork(){
        $result  = NatureOfWork::find()->select(['nature_of_work.id','nature_of_work.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('nature_of_work.id')->asArray()->all();
        return self::getFormattedProperty($result);
    }
    
    public static function getEmployments(){
        $result = Employment::find()->select(['employment.id','employment.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('employment.id')->asArray()->all();
        return self::getFormattedProperty($result);
    }

    public static function getExpiriencies(){
        $result = Expiriencies::find()->select(['expiriencies.id','expiriencies.title','COUNT(vacancies.id) as count'])->joinWith('vacancies',false)->groupBy('expiriencies.id')->asArray()->all();
        return self::getFormattedProperty($result);
    }
    
    public static function getStudents(){
        $result = Vacancies::find()->select(['COUNT(is_for_student) as count','is_for_student as id',"IF (is_for_student = 1,'Можно','Нет') as title"])->groupBy('vacancies.is_for_student')->asArray()->all();
        return self::getFormattedProperty($result);
    }

    private static function getFormattedProperty($property){
        $result = [];
        foreach ($property as $key => $value){
            $result[$value['id']] = $value;
        }
        return $result;
    }
    
    public function actionSpecialitiesSection(){
       $specialitiesSections = SpecialitiesSection::find()->asArray()->all();
       
       $specialitiesSubsections = \app\models\SpecialitiesSubsection::find()
               ->select(['`specialities_subsection`.`id`','`specialities_subsection`.`title`','specialities_section.id as section_id','COUNT(vacancies.id) AS count'])
               ->joinWith('specialities',false)
               ->joinWith('specialitiesSection',false)
               ->leftJoin('vacancies_has_specialities','`specialities`.`id` = `vacancies_has_specialities`.`specialities_id`')
               ->leftJoin('vacancies','`vacancies_has_specialities`.`vacancies_id` = `vacancies`.`id`')
               ->groupBy('specialities_subsection.id')
               ->asArray()
               ->all();
       
       foreach ($specialitiesSections as &$section){
            $section['specialitiesSubsections'] = [];
           foreach ($specialitiesSubsections as $subsection){
              
               if(isset($section['id']) && $section['id'] == $subsection['section_id']){
                    $section['specialitiesSubsections'][] = $subsection;
               }
           }
       }
       return $this->render('specialities_sections',[
           'specialitiesSections' => $specialitiesSections
       ]);
    }

    public function actionSpecialities($section){
       $specialitySection = \app\models\SpecialitiesSubsection::findOne($section);
       
       $specialities = \app\models\Specialities::find()->select(['specialities.id','specialities.title','COUNT(vacancies.id) as count'])->joinWith('specialitiesSubsections',false)->joinWith('vacancies',false)->where(['specialities_subsection.id'=>$section])->groupBy('specialities.id')->asArray()->all();
       
       return $this->render('specialities',[
           'section' => $specialitySection,
           'specialities' => $specialities
       ]);
    }
    
    public function actionMap(){
        $searchModel = new VacanciesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
        $vacancies = $dataProvider->getModels();
        
        return $this->render('map', compact('vacancies'));
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
