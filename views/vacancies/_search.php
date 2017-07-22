<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */

$template = function ($index, $label, $name, $checked, $value){
               return '<div class="filter"><label>' . Html::radio($name, $checked, ['value' => $label['id']]) . $label['title'] . '</label><span>'.$label['count'].'</span></div>';
            }

?>

<div class="vacancies-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
    
    <div class="relate-filter">Зарплата</div>
    <div class="filter">
        <?= $form->field($model, 'salaries')->radioList($salaries,[
            'item' => $template,
        ])->label(false) ?>
    </div>
    
    <div class="relate-filter">График работы</div>
    <div class="filter">
       <?= $form->field($model, 'schedules')->radioList($schedule,[
            'item' => $template,
        ])->label(false) ?>
    </div>
    
    <div class="relate-filter">Занятость</div>
    <div class="filter">
        <?= $form->field($model, 'employments')->radioList($employment,[
            'item' => $template,
        ])->label(false) ?>
    </div>
    
    <div class="relate-filter">Характер работы</div>
    <div class="filter">
        <?= $form->field($model, 'natureOfWorks')->radioList($natureOfWork,[
            'item' => $template,
        ])->label(false) ?>
    </div>
    
    <div class="relate-filter">Уровень образования</div>
    <div class="filter">
        <?= $form->field($model, 'educations')->radioList($education,[
            'item' => $template,
        ])->label(false) ?>
    </div>
    
    <div class="relate-filter">Опыт работы</div>
    <div class="filter">
        <?= $form->field($model, 'expiriencies')->radioList($expiriencies,[
            'item' => $template,
        ])->label(false) ?>
    </div>
    
    <div class="relate-filter">Студент</div>
    <div class="filter">
        <?= $form->field($model, 'is_for_student')->radioList($student,[
            'item' => $template,
        ])->label(false) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
