<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Summary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'statuses_id' => $model->statuses_id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id, 'marital_statuses_id' => $model->marital_statuses_id, 'business_trips_id' => $model->business_trips_id, 'relocation_id' => $model->relocation_id, 'get_to_work_id' => $model->get_to_work_id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'computer_skills_level_id' => $model->computer_skills_level_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'statuses_id' => $model->statuses_id, 'cities_id' => $model->cities_id, 'pictures_id' => $model->pictures_id, 'marital_statuses_id' => $model->marital_statuses_id, 'business_trips_id' => $model->business_trips_id, 'relocation_id' => $model->relocation_id, 'get_to_work_id' => $model->get_to_work_id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'computer_skills_level_id' => $model->computer_skills_level_id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'middle_name',
            'last_name',
            'birth_date',
            'sex',
            'childrens',
            'career_objective',
            'salary',
            'driver_license',
            'availability_of_car',
            'description:ntext',
            'created_at',
            'updated_at',
            'views',
            'statuses_id',
            'cities_id',
            'pictures_id',
            'marital_statuses_id',
            'business_trips_id',
            'relocation_id',
            'get_to_work_id',
            'expiriencies_id',
            'education_id',
            'computer_skills_level_id',
            'user_id',
        ],
    ]) ?>

</div>
