<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancies */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    <div class="iner-wrap clearfix">
        
        <div class="col-xs-2 short-info">
            <div class='info-line' id='company'><a href='<?= yii\helpers\Url::toRoute(['organizations/view','id'=>$model->organizations->id, 'cities_id'=>$model->organizations->cities_id, 'pictures_id' => $model->organizations->pictures_id])?>'><?= $model->organizations->institutional_legal_form?> &laquo<?= $model->organizations->title; ?>&raquo</a></div>
            <div class='info-line'><b>Контактное лицо:</b>
                <div id='contact'><?= $model->contact_person; ?></div>  
            </div>
            <div class='info-line'><b>Номера телефонов:</b>
                <div id='number'>8 (029) 111-11-11</div>      
            </div>
            <div class='info-line'><b>Электронная почта:</b>
                <div id='mail'><a href='#'>putrov@mail.ru</a></div>   
            </div>
            <div class='info-line'>
                <form>
                    <button class='apply'>Откликнуться</button>
                </form>
            </div>
        </div>
        
        <div class="col-xs-8 main">
            <div class="main-head">
                <h1 class='post-name'><?= $model->title; ?></h1>
                <div class='tags'>
                    <?php foreach ($model->specialities as $speciality): ?>
                    <?= Html::a(
                            $speciality->title, 
                            yii\helpers\Url::toRoute([
                                'vacancies/index',
                                'VacanciesSearch[speciality]' => $speciality->id,
                                'speciality'=>$speciality->id]), 
                            ['id'=>'tag']); ?>
                    <?php endforeach;?>
                </div>
                <div id="price"><?= $model->salary; ?></div>
                <div id="city"><?= $model->cities->title; ?></div>
                <div id="post-info">Вакансия №<?= $model->id; ?> | Обновлена <?= $model->updated_at; ?></div>
                <div id="report"><a href="#">Пожаловаться</a></div>
            </div>
            <div class="offer underline">
                <div class="h2-like">Предложение организации</div>
                <?php if(!empty($model->natureOfWorks)): ?>
                <div class='offer-row'>
                    <div class='offer-term'>Характер работы</div>
                    <div class='offer-desc'><?= $model->natureOfWorks->title; ?></div>
                </div>
                <?php endif;?>
                <?php if(!empty($model->schedules)): ?>
                <div class='offer-row'>
                    <div class='offer-term'>График работы</div>
                    <div class='offer-desc'><?= $model->schedules->title; ?></div>
                </div>
                <?php endif;?>
                <?php if(!empty($model->employments)): ?>
                <div class='offer-row'>
                    <div class='offer-term'>Занятость</div>
                    <div class='offer-desc'><?= $model->employments->title; ?></div>
                </div>
                <?php endif;?>
                <div class="h2-like">Требования к кандидату</div>
                <div class='offer-row'>
                    <div class='offer-term'>Общие требования</div>
                    <div class='offer-desc'>
                        <?php if(!empty($model->expiriencies)): ?>
                            <p><?= $model->expiriencies->title; ?></p>
                        <?php endif;?>
                        <?php if(!empty($model->education)): ?>
                            <p><?= $model->education->title; ?></p>
                        <?php endif;?>
                        <p><?= $model->is_for_student == 1 ? 'Можно студент ': 'Не студент'; ?></p>
                    </div>
                </div>
            </div>
            <div class="description underline">
                <div class="h2-like">Описание вакансии</div>
                <p><?= $model->description; ?></p>
            </div>
            <div class="large-info underline">
                <div class="h2-like">Контакты организации</div>
                <div class='offer-row'>
                    <div class='offer-term'>Контактное лицо:</div>
                    <div class='offer-desc'>
                        <div id='contact'><?= $model->contact_person; ?></div>  
                    </div>
                </div>
                <div class='offer-row'>
                    <div class='offer-term'>Номера телефонов:</div>
                    <div class='offer-desc'>
                        <div id='number'>8 (029) 111-11-11</div>
                    </div>
                </div>
                <div class='offer-row'>
                    <div class='offer-term'>Электронная почта:</div>
                    <div class='offer-desc'>
                        <div id='mail'><a href='#'>putrov@mail.ru</a></div> 
                    </div>
                </div>
                <div class='offer-row'>
                    <div class='offer-term'>                  
                        <form>
                            <button class='apply'>Откликнуться</button>
                        </form>
                    </div>
                    <div class='offer-desc'>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-2 short-info">
            <div class="print">
                <a href="#">Версия для печати</a>
            </div>
            <div class="print">
                <a href="#">Скачать в Word</a>
            </div>
            <div class="print">
                <a href="#">Скачать в Pdf</a>
            </div>
        </div>
    </div>
</div>
