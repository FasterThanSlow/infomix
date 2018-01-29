<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Summary */

$this->title = 'Update Summary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'statuses_id' => $model->statuses_id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id, 'marital_statuses_id' => $model->marital_statuses_id, 'business_trips_id' => $model->business_trips_id, 'relocation_id' => $model->relocation_id, 'get_to_work_id' => $model->get_to_work_id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'computer_skills_level_id' => $model->computer_skills_level_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="summary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
