<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Description of AppAdminController
 *
 * @author Валим
 */
class AppAdminController extends Controller{
    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ]
                ]
            ]
        ];
    }
}
