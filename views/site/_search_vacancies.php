<?php
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
$templateCheckbox = function ($index, $label, $name, $checked, $value){
    return 
    '<div class="checkbox-inline" style="margin-left:0px;">
        <label>'.Html::checkbox($name, $checked, ['value' => $value]).$label['title'].'</label>
    </div>';
};

$templateRadio = function ($index, $label, $name, $checked, $value){
    return 
    '<div class="radio-inline" style="margin-left:0px;">
        <label>'.Html::radio($name, $checked, ['value' => $value]).$label['title'].'</label>
    </div>';
};

$sort = [
    '-updated_at' => ['title' => 'по дате обновления'],
    'salary' => ['title' => 'по возрастанию зарплаты'],
    '-salary' => ['title' => 'по убыванию зарплаты']
];
        
$period = [
    0 => ['title' =>'за все время'],
    86400 => ['title' =>'за сутки'],
    259200 => ['title' =>'за 3 дня'],
    604800 => ['title' =>'за неделю'],
    2629743 => ['title' =>'за месяц'],
    7889229 => ['title' =>'за 3 месяца'],
    15778458 => ['title' =>'за полгода']
];
?>

<div id="modalVacancies" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Расширенный поиск вакансий</h4>
            </div>
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'action' => ['vacancies/index'],
                'fieldConfig' => ['options' => ['class' => 'search-group']],
            ]); ?>
            <div class="modal-body" >
                <h2>Информация о работе</h2>
                    <h3 class="search-group">Название</h3>
                    <?= $form->field($searchModel, 'title')->textInput()->label(false) ?>
                <div class='search-group'>
                    <h3>Зарплата</h3>
                    <?= $form->field($searchModel, 'salaries')->radioList($salaries,[
                        'item' => $templateRadio,
                    ])->label(false) ?>
                </div>
                <div class='search-group'>
                    <h3>График работы</h3>
                    <?= $form->field($searchModel, 'schedules')->checkboxList($schedule,[
                        'item' => $templateCheckbox,
                    ])->label(false) ?>
                </div>
                <div class='search-group'>
                    <h3>Характер работы</h3>
                    <?= $form->field($searchModel, 'natureOfWorks')->checkboxList($natureOfWork,[
                        'item' => $templateCheckbox,
                    ])->label(false) ?>
                </div>
                <div class='search-group'>
                    <h3>Занятость</h3>
                    <?= $form->field($searchModel, 'employments')->checkboxList($employment,[
                        'item' => $templateCheckbox,
                    ])->label(false) ?>
                </div>
                <h2>Информация о соискателе</h2>
                <div class='search-group'>
                    <h3>Опыт работы</h3>
                    <?= $form->field($searchModel, 'expiriencies')->radioList($expiriencies,[
                        'item' => $templateRadio,
                    ])->label(false) ?>
                </div>
                <div class='search-group'>
                    <h3>Образование</h3>
                    <?= $form->field($searchModel, 'educations')->radioList($education,[
                        'item' => $templateRadio,
                    ])->label(false) ?>
                </div>
                <div class='search-group'>
                    <h3>Студент</h3>
                    <?= $form->field($searchModel, 'is_for_student')->radioList($student,[
                        'item' => $templateRadio,
                    ])->label(false) ?>
                </div>
                <h2>Отображение результатов поиска</h2>
                <div class='search-group'>
                    <h3>Сортировать</h3>
                    <?= Html::radioList('sort',null,$sort,[
                        'item' => $templateRadio,
                        'class' => 'search-group'
                    ]); ?>
                </div>
                <div class='search-group'>
                    <h3>Показывать вакансии</h3>
                    <?= $form->field($searchModel, 'period')->radioList($period,[
                        'item' => $templateRadio,
                    ])->label(false) ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name='searchVacancies' value='Y'>Найти</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>