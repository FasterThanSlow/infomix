<?php

use yii\helpers\Html;
use yii\helpers\Url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Каталог вакансий';
$specialitiesRightSide = array_slice($specialities, 0 , count($specialities) / 2);
$specialitiesLeftSide = array_slice($specialities, count($specialities) / 2 , ceil(count($specialities) / 2));
?>
<div class="vak_catalog">
<div class="l_column-main" role="main">

    <div class="l_default-width" style="padding-left: 4%;">
        <h1 class="no-margin-top">
            <?= $this->title; ?>
        </h1>

        <h2><?= $section->title; ?></h2>
        
        <p><a href="<?= yii\helpers\Url::toRoute('vacancies/specialities-section')?>">← назад к каталогу вакансий</a></p>

        <div class="l_search-greed">
            <div class="l_search-greed__column-3">

                <div class="catalogue-container">
                     <?= Html::ul($specialitiesRightSide, [
                        'item' => function($item, $index) {
                            return Html::tag(
                                'li',
                                Html::a($item['title'], Url::toRoute(['vacancies/index','VacanciesSearch[speciality]' => $item['id']])).'<span class="catalogue__item__count">'.$item['count'].'</span>',
                                ['class' => 'catalogue__item']
                            );
                        },
                        'class' => 'catalogue',
                    ]) ?>
                    <?= Html::ul($specialitiesLeftSide, [
                        'item' => function($item, $index) {
                            return Html::tag(
                                'li',
                                Html::a($item['title'], Url::toRoute(['vacancies/index','VacanciesSearch[speciality]' => $item['id']])).'<span class="catalogue__item__count">'.$item['count'].'</span>',
                                ['class' => 'catalogue__item']
                            );
                        },
                        'class' => 'catalogue',
                    ]) ?>
                </div>

            </div>

            <div class="l_search-greed__column-4" style="margin-bottom: 40px;">
                <div class="bnplace-2-1" id="right-banner-1">
                    <div style="overflow:hidden;text-align:center;width:240px;height:70px;"><a href="http://bs.commontools.net/bs/click/l7aL80/" target="_blank"><img src="https://bs.commontools.net/bs/banner/Wl6fh0/l7aL80/?" alt="Белэнергострой" style="width:240px;height:70px;" border="0"></a></div></div>			
                        <div class="bnplace-2-2" id="right-banner-2">
                        </div>			
                        <div class="bnplace-2-3" id="right-banner-3">
                        <div style="overflow:hidden;text-align:center;width:240px;height:400px;"><a href="http://bs.commontools.net/bs/click/Wjiaw0/" target="_blank"><img src="https://bs.commontools.net/bs/banner/Y9XqL0/Wjiaw0/?" alt="КомплексСолюшнз" style="width:240px;height:400px;" border="0"></a></div></div>			
                <div class="bnplace-2-4" id="right-banner-4">
                </div>		
            </div>
            
        </div>
    </div>    
</div>
</div>