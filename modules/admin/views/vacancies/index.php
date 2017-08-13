<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\VacanciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вакансии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать вакансию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'salary',
            'description:ntext',
            'views',
            // 'is_responseble',
            // 'is_contactable',
            // 'contact_person',
            // 'created_at',
            // 'updated_at',
            // 'expiriencies_id',
            // 'education_id',
            // 'organizations_id',
            // 'statuses_id',
            // 'members_id',
            // 'cities_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
