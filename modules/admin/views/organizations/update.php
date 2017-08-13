<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organizations */

$this->title = 'Редактирование компании: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="organizations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
