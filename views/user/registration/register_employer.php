<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = 'Регистрация работодателя';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class='inner-wrap'>

    <div class="firw">
        <h1 id="mw"><?= $this->title; ?></h1>
    </div>

    <div style="margin-bottom: 20px;margin-top: 20px;">
        <p id="tlt">Тип организации<span class="red-star" id='valid'> *</span></p>
        <input name="radio" type="radio" checked="checked" value="yes" id="radio1" class="ui-checkboxradio ui-helper-hidden-accessible" onclick="document.getElementById('compname').value = ''">
        <label for="radio1">
            <span class="text">Юридическое лицо</span>
        </label>
        <input name="radio" type="radio" value="no" id="radio2" class="ui-checkboxradio ui-helper-hidden-accessible" onclick="document.getElementById('compname').value = 'ИП'">
        <label for="radio2" class="" >
            <span class="text">Индивидуальный предприниматель</span>
        </label>
    </div>
    
    <?php $form = ActiveForm::begin([
        'id' => 'registration-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ]); ?>
    
    <p id="tlt">Персональная информация</p>
    
    <div class="mname">
    
    <div>
        <div class="onei">
            <label class='lable-form'>E-mail<span class="red-star" id='valid'> *</span></label>
            <?= $form->field($model, 'email')->label(false); ?>
        </div>

        <div class="onei">
            <label class='lable-form'>Логин<span class="red-star" id='valid'> *</span></label>
            <?= $form->field($model, 'username')->label(false); ?>
        </div>
    </div>
    
    <?php if ($module->enableGeneratingPassword == false): ?>
    <div class="pas">
        <div class="onei">
            <label class='lable-form'>Пароль<span class="red-star"> *</span></label>
             <?= $form->field($model, 'password')->passwordInput()->label(false); ?>
        </div>

        <div class="onei">
            <label class='lable-form'>Повторить пароль<span class="red-star"> *</span></label>
             <?= $form->field($model, 'password_repeat')->passwordInput()->label(false); ?>
        </div>
    </div>    
    <?php endif ?>    
    
    <div>
        <div class="onei">
            <label class='lable-form'>Фамилия<span class="red-star"> *</span></label>
            <?= $form->field($model, 'middle_name')->label(false); ?>
        </div>
        <div class="onei">
            <label class='lable-form'>Имя<span class="red-star"> *</span></label>
            <?= $form->field($model, 'first_name')->label(false); ?>
        </div>
        <div class="onei" id="name">
            <label class='lable-form1'>Отчество</label>
            <?= $form->field($model, 'last_name')->label(false) ?>
        </div>

    </div>

    <div class="onei" id='hiddenInput'>
        <label class='lable-form' class='posts' type='text'>Должность<span class="red-star"> *</span></label>
        <?= $form->field($model, 'post')->label(false) ?>
    </div>
        
    <div>
        <p id="tlt" style='padding-top: 20px;'>Информация об организации</p>
        
        <div class="onei">
            <label class='lable-form'>Наименование<span class="red-star"> *</span></label>
           <?= $form->field($model, 'institutional_legal_form',['inputOptions'=>['id'=>'compname']])->label(false) ?>
        </div>
        <div class="onei">
             <?= $form->field($model, 'title',[ 'inputOptions'=>['class'=>false,'style'=>'margin-right:0px;'],'options' => [  ],'template' => '<span><b> 	&laquo;</b> </span>{input}<span> <b>&raquo;</b> </span>{error}', ])->label(false) ?>
        </div>
        
    </div>

    <div>
        <div class="onei">
            <label class='lable-form'>УНП<span class="red-star"> *</span></label>
            <?= $form->field($model, 'unp')->label(false) ?>
        </div>
        <div class="onei">
            <label class='lable-form'>Город<span class="red-star"> *</span></label>
            <?= $form->field($model, 'cities_id',['options'=>['tag'=>false], 'inputOptions'=>['style'=>'height:28px;font-size:12px;border-width:1.5px;border-color:#d7d7d7;padding-top:1px;padding-bottom:1px;','class'=>'form-control']])->dropDownList(app\controllers\AppController::getCities())->label(false); ?>
        </div>
    </div>
 
    <div>
        <div class="onei">
            <label class='lable-form'>Юридический адрес (местонахождение)<span class="red-star"> *</span></label>
            <?= $form->field($model, 'legal_address')->label(false) ?>
        </div>
    </div>
    
    <div class="telly">
        <p id="tlt">Контакты</p>
        <p id="secondary">Основной номер телефона<span id="applicant-register-primary-contact" class="help-icon" data-original-title="" title=""></span></p>
        <div class="onei" style="margin-top: 0px;margin-bottom: 20px;">
            <label class='lable-form'>Телефон<span class="red-star"> *</span></label>
            <?= $form->field($model, 'main_phone',['inputOptions' => ['class'=>'form-control']])->label(false) ?>
        </div>
    </div>
    <p>При необходимости этот номер может быть использован менеджерами портала Infomix для связи с вашей организацией</p>

    <p id="secondary" class="now" style="margin-top: 12px;">Другие способы связи</p>
    <div id="template">
        <div class="block">
            <div>
                <div class="ochoices">
                    <div class="choices">
                        <div class="item" style="width:10px;margin-left: 15px;">
                            <p id="secondary">Тип</p>
                            <?= $form->field($model,'contacts[][type]')->dropDownList(app\controllers\AppController::getContactTypes())->label(false); ?>
                        </div>
                        <div class="item" style="margin-left: 15px;">
                            <p id="secondary">Значение</p>
                            <?= $form->field($model, 'contacts[][value]')->label(false) ?>
                        </div>
                    </div>
                </div>
                <div id="mixr" style="display:inline-block;">
                    <i style="display:inline-block;"></i>
                    <p onclick = "$('#wrapper').children('.block:last').remove()" onstyle="display:inline-block;">Удалить</p>
                </div>
            </div>
                <div class="joinadd" id="mixr" style="margin-top: 15px;">
                    <i aria-hidden="true"></i>
                    <p onclick="$('#wrapper').append($('#template').children('.block').clone())" style="display:inline-block;">Добавить</p>
                </div>
            </div>
    </div>
    <div id="wrapper"></div> 
    <?= Html::submitInput(Yii::t('user', 'Sign up'), ['class' => 'btn-style','style'=>'margin-top: 50px;']) ?>
    </div>
    
    <?= $form->field($model, 'pictures_id')->hiddenInput(['value'=>'2'])->label(false) ?>
    <?php ActiveForm::end(); ?>
           
</div>