<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "levels_of_studing".
 *
 * @property string $id
 * @property string $title
 *
 * @property SummariesLanguageSkills[] $summariesLanguageSkills
 * @property VacanciesLanguageSkills[] $vacanciesLanguageSkills
 */
class LevelsOfStuding extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'levels_of_studing';
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
    public function getSummariesLanguageSkills()
    {
        return $this->hasMany(SummariesLanguageSkills::className(), ['levels_of_studing_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesLanguageSkills()
    {
        return $this->hasMany(VacanciesLanguageSkills::className(), ['levels_of_studing_id' => 'id']);
    }
}
