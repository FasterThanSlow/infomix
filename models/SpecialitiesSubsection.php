<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialities_subsection".
 *
 * @property string $id
 * @property string $title
 * @property string $specialities_section_id
 *
 * @property SpecialitiesSection $specialitiesSection
 * @property SpecialitiesSubsectionHasSpecialities[] $specialitiesSubsectionHasSpecialities
 * @property Specialities[] $specialities
 */
class SpecialitiesSubsection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialities_subsection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['specialities_section_id'], 'required'],
            [['specialities_section_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['specialities_section_id'], 'exist', 'skipOnError' => true, 'targetClass' => SpecialitiesSection::className(), 'targetAttribute' => ['specialities_section_id' => 'id']],
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
            'specialities_section_id' => 'Specialities Section ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialitiesSection()
    {
        return $this->hasOne(SpecialitiesSection::className(), ['id' => 'specialities_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialitiesSubsectionHasSpecialities()
    {
        return $this->hasMany(SpecialitiesSubsectionHasSpecialities::className(), ['specialities_subsection_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialities()
    {
        return $this->hasMany(Specialities::className(), ['id' => 'specialities_id'])->viaTable('specialities_subsection_has_specialities', ['specialities_subsection_id' => 'id']);
    }
}
