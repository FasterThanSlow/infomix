<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property string $id
 * @property string $title
 *
 * @property SummaryHasSchedule[] $summaryHasSchedules
 * @property Summary[] $summaries
 * @property VacanciesHasSchedule[] $vacanciesHasSchedules
 * @property Vacancies[] $vacancies
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasSchedules()
    {
        return $this->hasMany(SummaryHasSchedule::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['id' => 'summary_id'])->viaTable('summary_has_schedule', ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasSchedules()
    {
        return $this->hasMany(VacanciesHasSchedule::className(), ['schedule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['id' => 'vacancies_id'])->viaTable('vacancies_has_schedule', ['schedule_id' => 'id']);
    }
}
