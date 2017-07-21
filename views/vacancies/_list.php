<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VacanciesSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<li class="free vac-small">
    <div class="vac-small__column vac-small__column_1"></div>
    <div class="vac-small__column vac-small__column_2">
        <div>
            <a class="vac-small__title" href="<?=
            yii\helpers\Url::to([
                'vacancies/view',
                'id' => $model->id,
                'expiriencies_id' => $model->expiriencies_id,
                'education_id' => $model->education_id,
                'organizations_id' => $model->organizations_id,
                'statuses_id' => $model->statuses_id,
                'members_id' => $model->members_id
            ])
            ?>"><?= $model->title ?></a>
        </div>

<?php if (!empty($model->salary)): ?>
            <div class="vac-small__salary">
                <span class="salary-dotted"><?= $model->salary ?> руб.</span>  
            </div>
<?php endif; ?>

        <div class="vac-small__experience">
            <div class="vac-small__experience-item"><i class="icon-signal"></i><?= $model->expiriencies->title ?></div>
            <div class="vac-small__experience-item"><i class="icon-graduation-cap"></i><?= $model->education->title ?></div>
        </div>

        <div class="vac-small__upd">
            <a href="#"><?= $model->organizations->institutional_legal_form ?> «<?= $model->organizations->title ?>»</a>
            <span  style="padding-left: 8px">|</span>
            <div class="vac-small__city">
                <i></i><span style="color:#4b4f54;"><?= $model->organizations->cities->title ?></span>
            </div>
            <span style="padding-right: 8px">|</span>
            <span class="nowrap"><?= Yii::$app->formatter->asDatetime($model->updated_at) ?></span>
        </div>
    </div>
</li>