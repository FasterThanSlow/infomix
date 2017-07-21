<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialities".
 *
 * @property string $id
 * @property string $title
 * @property string $parent_id
 *
 * @property SummaryHasSpecialities[] $summaryHasSpecialities
 * @property Summary[] $summaries
 * @property VacanciesHasSpecialities[] $vacanciesHasSpecialities
 * @property Vacancies[] $vacancies
 */
class Specialities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
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
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasSpecialities()
    {
        return $this->hasMany(SummaryHasSpecialities::className(), ['specialities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['id' => 'summary_id'])->viaTable('summary_has_specialities', ['specialities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasSpecialities()
    {
        return $this->hasMany(VacanciesHasSpecialities::className(), ['specialities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['id' => 'vacancies_id'])->viaTable('vacancies_has_specialities', ['specialities_id' => 'id']);
    }
}
