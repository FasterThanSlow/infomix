<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "price_filters".
 *
 * @property integer $id
 * @property integer $value
 * @property string $title
 */
class PriceFilters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_filters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['value'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'value' => 'Значение',
            'title' => 'Заголовок',
        ];
    }
}
