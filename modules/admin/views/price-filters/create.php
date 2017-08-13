<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PriceFilters */

$this->title = 'Создать ценовой фильтр';
$this->params['breadcrumbs'][] = ['label' => 'Фильтры цены', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-filters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
