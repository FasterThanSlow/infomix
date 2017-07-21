<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancies_has_schedule".
 *
 * @property string $vacancies_id
 * @property string $schedule_id
 *
 * @property Schedule $schedule
 * @property Vacancies $vacancies
 */
class VacanciesHasSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancies_has_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vacancies_id', 'schedule_id'], 'required'],
            [['vacancies_id', 'schedule_id'], 'integer'],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['schedule_id' => 'id']],
            [['vacancies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancies::className(), 'targetAttribute' => ['vacancies_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vacancies_id' => 'Vacancies ID',
            'schedule_id' => 'Schedule ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasOne(Vacancies::className(), ['id' => 'vacancies_id']);
    }
}
