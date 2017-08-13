<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainMenu */

$this->title = 'Обновить пункт меню: ' . $model->title;
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="main-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
