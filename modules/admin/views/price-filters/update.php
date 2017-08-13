<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceFilters */

$this->title = 'Редактировать ценовой фильтр: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фильтры цены', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="price-filters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
