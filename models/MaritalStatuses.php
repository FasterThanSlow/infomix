<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marital_statuses".
 *
 * @property string $id
 * @property string $title
 *
 * @property Summary[] $summaries
 */
class MaritalStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marital_statuses';
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
        return $this->hasMany(Summary::className(), ['marital_statuses_id' => 'id']);
    }
}
