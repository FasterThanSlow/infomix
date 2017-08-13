<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\MainMenu;

class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $post = Yii::$app->request->post();
        if(!empty($post['mainText'])){
            $text = \app\models\MainText::findOne(1);
            $text->title = $post['mainText'];
            $text->save();
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => MainMenu::find(),
        ]);

        return $this->render('index', compact('dataProvider'));
    }
    
    public function actionStatistics(){
        $countVacancies = \app\models\Vacancies::find()->count();
        $countSummaries = \app\models\Summary::find()->count();
        $countCompetitor = \app\models\User::find()->joinWith('userType')->where(['user_type.id' => 2])->count();
        $countEmployer = \app\models\User::find()->joinWith('userType')->where(['user_type.id' => 1])->count();
        return $this->render('statistics', compact(
                'countVacancies',
                'countSummaries',
                'countCompetitor',
                'countEmployer'));
    }
    
    public function actionTariff(){
       return $this->render('tariff');
    }
    
    public function actionBanners(){
       return $this->render('banners');
    }
}
