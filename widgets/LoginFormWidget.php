<?php
 
namespace app\widgets;
 
use Yii;
use yii\base\Widget;
use dektrium\user\models\LoginForm;
 
class LoginFormWidget extends Widget {
 
    public function run() {
        if (Yii::$app->user->isGuest) {
            $model = \Yii::createObject(LoginForm::className());
            return $this->render('loginFormWidget', [
                'model' => $model,
            ]);
        } else {
            return ;
        }
    }
 
}