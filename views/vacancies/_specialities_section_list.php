<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h4 class="catalogue__section-title h3-like"><?= $model['title'] ?></h4>
<?= Html::ul($model['specialitiesSubsections'],[
    'item' => function($item, $index) {
        return Html::tag(
            'li',
            Html::a($item['title'], Url::toRoute(['vacancies/specialities','section' => $item['id']])),
            ['class' => 'catalogue__item']
        );
    },
    'class' => 'catalogue__inner-list'
])?>