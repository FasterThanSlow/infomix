<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancies_language_skills".
 *
 * @property string $id
 * @property string $languages_id
 * @property string $levels_of_studing_id
 * @property string $vacancies_id
 *
 * @property Languages $languages
 * @property LevelsOfStuding $levelsOfStuding
 * @property Vacancies $vacancies
 */
class VacanciesLanguageSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancies_language_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['languages_id', 'levels_of_studing_id', 'vacancies_id'], 'required'],
            [['languages_id', 'levels_of_studing_id', 'vacancies_id'], 'integer'],
            [['languages_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['languages_id' => 'id']],
            [['levels_of_studing_id'], 'exist', 'skipOnError' => true, 'targetClass' => LevelsOfStuding::className(), 'targetAttribute' => ['levels_of_studing_id' => 'id']],
            [['vacancies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancies::className(), 'targetAttribute' => ['vacancies_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'languages_id' => 'Languages ID',
            'levels_of_studing_id' => 'Levels Of Studing ID',
            'vacancies_id' => 'Vacancies ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasOne(Languages::className(), ['id' => 'languages_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelsOfStuding()
    {
        return $this->hasOne(LevelsOfStuding::className(), ['id' => 'levels_of_studing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasOne(Vacancies::className(), ['id' => 'vacancies_id']);
    }
}
