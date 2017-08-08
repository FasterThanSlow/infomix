<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\controllers;

/* @var $this yii\web\View */
/* @var $model app\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */

$template = function ($index, $label, $name, $checked, $value){
    if($checked) $active = '-active'; else $active = '';
    return '<div class="filter"><label>' . Html::radio($name, $checked, ['value' => $value]) .'<div class="filter-title radio-filter'.$active.'">'.$label['title'].'</div>'. '</label><span>'.$label['count'].'</span></div>';
 };
?>

<div class="vacancies-search">
    <?php if(!empty($model->salaries) || !empty($model->schedules) || !empty($model->employments) || !empty($model->natureOfWorks) || !empty($model->educations) || !empty($model->expiriencies) || !empty($model->is_for_student)):?>
    <div class="filtered affix-top">
        <div class="relate-filter">Текущие фильтры</div>
        <div class="clear">
        </div>
        <?php if(!empty($model->salaries)):?>
        <div class="value">
            Зарплата <?= $salaries[$model->salaries]['title']; ?> <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5Bsalaries%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!empty($model->schedules)):?>
        <div class="value">
            <?= $schedule[$model->schedules]['title']; ?> график <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5Bschedules%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!empty($model->employments)):?>
        <div class="value">
            <?= $employment[$model->employments]['title']; ?> занятость <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5Bemployments%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!empty($model->natureOfWorks)):?>
        <div class="value">
            <?= $natureOfWork[$model->natureOfWorks]['title']; ?> <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5BnatureOfWorks%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!empty($model->educations)):?>
        <div class="value">
            <?= $education[$model->educations]['title']; ?> <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5Beducations%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!empty($model->expiriencies)):?>
        <div class="value">
            Опыт работы <?= $expiriencies[$model->expiriencies]['title']; ?> <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5Bexpiriencies%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!empty($model->is_for_student)):?>
        <div class="value">
            Студентам <?= $student[$model->is_for_student]['title']; ?> <a href="<?= controllers\removeFromUrl(yii\helpers\Url::current(), 'VacanciesSearch%5Bis_for_student%5D')?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>
    
    <?= $form->field($model, 'speciality')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'period')->hiddenInput()->label(false); ?>
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
