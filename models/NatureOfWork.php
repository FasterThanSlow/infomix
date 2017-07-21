<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nature_of_work".
 *
 * @property string $id
 * @property string $title
 *
 * @property SummaryHasNatureOfWork[] $summaryHasNatureOfWorks
 * @property Summary[] $summaries
 * @property VacanciesHasNatureOfWork[] $vacanciesHasNatureOfWorks
 * @property Vacancies[] $vacancies
 */
class NatureOfWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nature_of_work';
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
    public function getSummaryHasNatureOfWorks()
    {
        return $this->hasMany(SummaryHasNatureOfWork::className(), ['nature_of_work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['id' => 'summary_id'])->viaTable('summary_has_nature_of_work', ['nature_of_work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasNatureOfWorks()
    {
        return $this->hasMany(VacanciesHasNatureOfWork::className(), ['nature_of_work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['id' => 'vacancies_id'])->viaTable('vacancies_has_nature_of_work', ['nature_of_work_id' => 'id']);
    }
}
