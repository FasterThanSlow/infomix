<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $user_type_id
 * @property string $addresses_id
 *
 * @property FavoritesVacancies[] $favoritesVacancies
 * @property Members[] $members
 * @property Summary[] $summaries
 * @property Addresses $addresses
 * @property UserType $userType
 * @property UserHasContacts[] $userHasContacts
 * @property Contacts[] $contacts
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'auth_key', 'password_hash', 'created_at', 'updated_at', 'first_name', 'middle_name', 'last_name', 'user_type_id', 'addresses_id'], 'required'],
            [['status', 'created_at', 'updated_at', 'user_type_id', 'addresses_id'], 'integer'],
            [['email', 'password_hash', 'password_reset_token', 'first_name', 'middle_name', 'last_name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['auth_key'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['addresses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Addresses::className(), 'targetAttribute' => ['addresses_id' => 'id']],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'user_type_id' => 'User Type ID',
            'addresses_id' => 'Addresses ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritesVacancies()
    {
        return $this->hasMany(FavoritesVacancies::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasOne(Addresses::className(), ['id' => 'addresses_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasContacts()
    {
        return $this->hasMany(UserHasContacts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['id' => 'contacts_id'])->viaTable('user_has_contacts', ['user_id' => 'id']);
    }
}
