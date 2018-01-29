<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\admin\controllers;

use dektrium\user\controllers\AdminController as BaseUserAdminController;

/**
 * Description of UserController
 *
 * @author Валим
 */
class UserController extends BaseUserAdminController{
    public $layout = '@app/modules/admin/views/layouts/admin';
}
