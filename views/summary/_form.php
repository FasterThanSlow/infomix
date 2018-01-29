<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Summary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="summary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'childrens')->textInput() ?>

    <?= $form->field($model, 'career_objective')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?= $form->field($model, 'driver_license')->textInput() ?>

    <?= $form->field($model, 'availability_of_car')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'views')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statuses_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cities_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pictures_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marital_statuses_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_trips_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relocation_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'get_to_work_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expiriencies_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'computer_skills_level_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
