<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $countVacancies = \app\models\Vacancies::find()->count();
        $countSummaries= \app\models\Summary::find()->count();
        
        if(isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'){
            $searchModel = new \app\models\VacanciesSearch();
            $salaries = VacanciesController::getSalariesArr();
            $schedule = VacanciesController::getSchedulesArr();
            $education = VacanciesController::getEducationArr();
            $employment = VacanciesController::getEmployments();
            $natureOfWork = VacanciesController::getNaturesOfWork();
            $expiriencies = VacanciesController::getExpiriencies();
            $student = VacanciesController::getStudents();
            
            return $this->render('index', compact(
                'searchModel',
                'countVacancies',
                'countSummaries',
                'salaries',
                'schedule',
                'education',
                'employment',
                'natureOfWork',
                'expiriencies',
                'student'));
        }
        
        return $this->render('index', compact('countVacancies','countSummaries'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        return $this->render('about');
    }
    
    public function actionEmployerRegister(){
        return $this->render('employer_register');
    }

    public function actionApplicantRegister(){
        
    }
    
    public function actionAjaxLogin() {
        if (Yii::$app->request->isAjax) {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->login()) {
                    return $this->goBack();
                } else {
                    Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                    return \yii\widgets\ActiveForm::validate($model);
                }
            }
        } else {
            throw new HttpException(404 ,'Page not found');
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
