<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_menu".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property integer $position
 */
class MainMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'position'], 'required'],
            [['position'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'title' => 'Название',
            'link' => 'Ссылка',
            'position' => 'Позиция',
        ];
    }
}
