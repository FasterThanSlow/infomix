<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employment".
 *
 * @property string $id
 * @property string $title
 *
 * @property SummaryHasEmployment[] $summaryHasEmployments
 * @property Summary[] $summaries
 * @property VacanciesHasEmployment[] $vacanciesHasEmployments
 * @property Vacancies[] $vacancies
 */
class Employment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employment';
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
    public function getSummaryHasEmployments()
    {
        return $this->hasMany(SummaryHasEmployment::className(), ['employment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['id' => 'summary_id'])->viaTable('summary_has_employment', ['employment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasEmployments()
    {
        return $this->hasMany(VacanciesHasEmployment::className(), ['employment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['id' => 'vacancies_id'])->viaTable('vacancies_has_employment', ['employment_id' => 'id']);
    }
}
