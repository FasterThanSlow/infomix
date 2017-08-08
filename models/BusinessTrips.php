<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_trips".
 *
 * @property string $id
 * @property string $title
 *
 * @property Summary[] $summaries
 */
class BusinessTrips extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_trips';
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
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['business_trips_id' => 'id']);
    }
}
