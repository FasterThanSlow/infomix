<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "get_to_work".
 *
 * @property string $id
 * @property string $title
 *
 * @property Summary[] $summaries
 */
class GetToWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'get_to_work';
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
        return $this->hasMany(Summary::className(), ['get_to_work_id' => 'id']);
    }
}
