<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancies */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id, 'cities_id' => $model->cities_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id, 'expiriencies_id' => $model->expiriencies_id, 'education_id' => $model->education_id, 'organizations_id' => $model->organizations_id, 'statuses_id' => $model->statuses_id, 'members_id' => $model->members_id, 'cities_id' => $model->cities_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить вакансию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'salary',
            'is_for_student',
            'description:ntext',
            'is_responseble',
            'is_contactable',
            'contact_person',
            'views',
            'created_at',
            'updated_at',
            'expiriencies_id',
            'education_id',
            'organizations_id',
            'statuses_id',
            'members_id',
            'cities_id',
        ],
    ]) ?>

</div>
