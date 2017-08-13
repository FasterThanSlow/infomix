<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancies */

$this->title = 'Редактирование вакансии: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id, 'cities_id' => $model->cities_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="vacancies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
