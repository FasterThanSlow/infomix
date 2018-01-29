<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_has_contacts".
 *
 * @property integer $user_id
 * @property string $contacts_id
 *
 * @property Contacts $contacts
 * @property User $user
 */
class UserHasContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'contacts_id'], 'required'],
            [['user_id', 'contacts_id'], 'integer'],
            [['contacts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contacts_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => user\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'contacts_id' => 'Contacts ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contacts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
