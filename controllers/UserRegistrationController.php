<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use dektrium\user\controllers\RegistrationController;
use app\models\user\ApplicantRegistrationForm;
use app\models\user\EmployerRegistrationForm;
/**
 * Description of UserRegistrationController
 *
 * @author Валим
 */
class UserRegistrationController extends RegistrationController{
    
    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        /** @var RegistrationForm $model */
        if(!empty(\Yii::$app->request->get()) && \Yii::$app->request->get('type') == 'employer'){
            $model = \Yii::createObject(EmployerRegistrationForm::className());
        }
        else{
            $model = \Yii::createObject(ApplicantRegistrationForm::className());
        }
        
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);
        
        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);

            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
            ]);
        }
        if(!empty(\Yii::$app->request->get()) && \Yii::$app->request->get('type') == 'employer'){
            return $this->render('@app/views/user/registration/register_employer', [
                'model'  => $model,
                'module' => $this->module,
            ]);
        }
        else{
            return $this->render('@app/views/user/registration/register_applicant', [
                'model'  => $model,
                'module' => $this->module,
            ]);
        }
    }
    
}
