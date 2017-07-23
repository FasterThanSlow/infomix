<?php

use yii\helpers\Html;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = 'Каталог вакансий';
$sectionsRightSide = array_slice($specialitiesSections, 0 , count($specialitiesSections) / 2);
$sectionsLeftSide = array_slice($specialitiesSections, count($specialitiesSections) / 2 , ceil(count($specialitiesSections) / 2));
?>
<div class="vak_catalog">
    <div class="l_column-main" role="main">
        <div class="l_default-width">
            
            <h1 class="no-margin-top" style="margin-left: 4%;"><?= $this->title ?></h1>
            <div class="l_search-greed">
                
                <div class="l_search-greed__column-3">
                    <div class="catalogue-container">
                        <!-- Specialities Sections -->
                        <?= Html::ul($sectionsRightSide, [
                            'item' => function($item, $index) {
                                return Html::tag(
                                    'li',
                                    $this->render('_specialities_section_list', ['model' => $item]),
                                    ['class' => 'catalogue__section']
                                );
                            },
                            'class' => 'catalogue',
                        ]) ?>
                        <?= Html::ul($sectionsLeftSide, [
                            'item' => function($item, $index) {
                                return Html::tag(
                                    'li',
                                    $this->render('_specialities_section_list', ['model' => $item]),
                                    ['class' => 'catalogue__section']
                                );
                            },
                            'class' => 'catalogue',
                        ]) ?>
                        <!-- end Specialities Sections -->
                    </div>
                </div>

                <div class="l_search-greed__column-4" style="margin-bottom: 40px;">
                    <div class="bnplace-2-1" id="right-banner-1">
                        <div style="overflow:hidden;text-align:center;width:240px;height:70px;"><a href="http://bs.commontools.net/bs/click/l7aL80/" target="_blank"><img src="https://bs.commontools.net/bs/banner/Wl6fh0/l7aL80/?" alt="Белэнергострой" style="width:240px;height:70px;" border="0"></a>
                        </div>
                    </div>            
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