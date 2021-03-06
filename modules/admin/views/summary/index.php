<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать резюме', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'middle_name',
            'last_name',
            'birth_date',
            // 'sex',
            // 'childrens',
            // 'career_objective',
             'salary',
            // 'driver_license',
            // 'availability_of_car',
            // 'description:ntext',
            // 'created_at',
            // 'updated_at',
             'views',
            // 'user_id',
            // 'statuses_id',
            // 'cities_id',
            // 'pictures_id',
            // 'marital_statuses_id',
            // 'business_trips_id',
            // 'relocation_id',
            // 'get_to_work_id',
            // 'expiriencies_id',
            // 'education_id',
            // 'computer_skills_level_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
