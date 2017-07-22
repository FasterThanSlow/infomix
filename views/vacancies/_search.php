<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */

$salaries = [
    300 => 'От 300 руб.',
    500 => 'От 500 руб.',
    700 => 'От 700 руб.',
    1200 => 'От 1200 руб.',
    'null' => 'Не указана',
];

?>

<div class="vacancies-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
    
    <div class="relate-filter">Зарплата</div>
    <div class="filter">
        <?= $form->field($model, 'salaries')->radioList($salaries)->label(false) ?>
    </div>
    
    <div class="relate-filter">График работы</div>
    <div class="filter">
        <?= $form->field($model, 'schedules')->radioList(yii\helpers\ArrayHelper::map(app\models\Schedule::find()->asArray()->all(),'id', 'title'))->label(false) ?>
    </div>
    
    <div class="relate-filter">Занятость</div>
    <div class="filter">
        <?= $form->field($model, 'employments')->radioList(yii\helpers\ArrayHelper::map(app\models\Employment::find()->asArray()->all(),'id', 'title'))->label(false) ?>
    </div>
    
    <div class="relate-filter">Характер работы</div>
    <div class="filter">
        <?= $form->field($model, 'natureOfWorks')->radioList(yii\helpers\ArrayHelper::map(app\models\NatureOfWork::find()->asArray()->all(),'id', 'title'))->label(false) ?>
    </div>
    
    <div class="relate-filter">Уровень образования</div>
    <div class="filter">
        <?= $form->field($model, 'educations')->radioList(yii\helpers\ArrayHelper::map(app\models\Education::find()->asArray()->all(),'id', 'title'))->label(false) ?>
    </div>
    
    <div class="relate-filter">Опыт работы</div>
    <div class="filter">
        <?= $form->field($model, 'expiriencies')->radioList(yii\helpers\ArrayHelper::map(app\models\Expiriencies::find()->asArray()->all(),'id', 'title'))->label(false) ?>
    </div>
    
    <div class="relate-filter">Студент</div>
    <div class="filter">
        <?= $form->field($model, 'is_for_student')->radioList(['0' => 'Нет', '1' => 'Можно'])->label(false) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
