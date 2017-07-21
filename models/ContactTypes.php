<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_types".
 *
 * @property string $id
 * @property string $title
 * @property string $description_head
 * @property string $description_body
 *
 * @property Contacts[] $contacts
 */
class ContactTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['title', 'description_head', 'description_body'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'description_head' => 'Description Head',
            'description_body' => 'Description Body',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['contact_types_id' => 'id']);
    }
}
