<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SummarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="summary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'childrens') ?>

    <?php // echo $form->field($model, 'career_objective') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'driver_license') ?>

    <?php // echo $form->field($model, 'availability_of_car') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'statuses_id') ?>

    <?php // echo $form->field($model, 'cities_id') ?>

    <?php // echo $form->field($model, 'pictures_id') ?>

    <?php // echo $form->field($model, 'marital_statuses_id') ?>

    <?php // echo $form->field($model, 'business_trips_id') ?>

    <?php // echo $form->field($model, 'relocation_id') ?>

    <?php // echo $form->field($model, 'get_to_work_id') ?>

    <?php // echo $form->field($model, 'expiriencies_id') ?>

    <?php // echo $form->field($model, 'education_id') ?>

    <?php // echo $form->field($model, 'computer_skills_level_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
