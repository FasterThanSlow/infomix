<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PriceFiltersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фильтры цены';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-filters-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать ценовой фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            'title',
            'value',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
