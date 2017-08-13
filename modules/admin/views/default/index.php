<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = "Общее";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='container-fluid'>
    <h2>Общие настройки</h2>
    <div class="container-fluid">
        <h3>Текст на главной странице</h3>
        <?php $form = ActiveForm::begin([
            'id' => 'contact-form',
            'method' => 'post',
            'action' => ['default/index'],
        ]); ?>
        <div class="form-group">
            <?= Html::textInput('mainText', app\controllers\AppController::getMainText(), ['class'=>'form-control']); ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <?php $form->end(); ?>
    </div>
    <div class="container-fluid">
        <h3>Редактирование меню на главной</h3>
        <div class="main-menu-index">
            <p>
                <?= Html::a('Создать пункт меню', ['menu/create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'title',
                    'link',
                    'position',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'menu'
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>