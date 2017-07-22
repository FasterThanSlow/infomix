<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialities_section".
 *
 * @property string $id
 * @property string $title
 *
 * @property SpecialitiesSubsection[] $specialitiesSubsections
 */
class SpecialitiesSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialities_section';
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
    public function getSpecialitiesSubsections()
    {
        return $this->hasMany(SpecialitiesSubsection::className(), ['specialities_section_id' => 'id']);
    }
}
