<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property string $id
 * @property string $title
 *
 * @property Addresses[] $addresses
 * @property Organizations[] $organizations
 * @property Summary[] $summaries
 * @property Vacancies[] $vacancies
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
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
    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['cities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['cities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['cities_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['cities_id' => 'id']);
    }
}
