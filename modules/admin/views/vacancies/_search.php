<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'salary') ?>

    <?= $form->field($model, 'is_for_student') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'is_responseble') ?>

    <?php // echo $form->field($model, 'is_contactable') ?>

    <?php // echo $form->field($model, 'contact_person') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'expiriencies_id') ?>

    <?php // echo $form->field($model, 'education_id') ?>

    <?php // echo $form->field($model, 'organizations_id') ?>

    <?php // echo $form->field($model, 'statuses_id') ?>

    <?php // echo $form->field($model, 'members_id') ?>

    <?php // echo $form->field($model, 'cities_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
