<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "computer_skills_level".
 *
 * @property string $id
 * @property string $title
 *
 * @property ProgrammSkills[] $programmSkills
 * @property Summary[] $summaries
 */
class ComputerSkillsLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'computer_skills_level';
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
    public function getProgrammSkills()
    {
        return $this->hasMany(ProgrammSkills::className(), ['computer_skills_level_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['computer_skills_level_id' => 'id']);
    }
}
