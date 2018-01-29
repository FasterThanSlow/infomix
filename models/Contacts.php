<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property string $id
 * @property string $value
 * @property string $contact_types_id
 *
 * @property ContactTypes $contactTypes
 * @property OrganizationsHasContacts[] $organizationsHasContacts
 * @property Organizations[] $organizations
 * @property UserHasContacts[] $userHasContacts
 * @property User[] $users
 * @property VacanciesHasContacts[] $vacanciesHasContacts
 * @property Vacancies[] $vacancies
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_types_id'], 'required'],
            [['contact_types_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['contact_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContactTypes::className(), 'targetAttribute' => ['contact_types_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'contact_types_id' => 'Contact Types ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactTypes()
    {
        return $this->hasOne(ContactTypes::className(), ['id' => 'contact_types_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsHasContacts()
    {
        return $this->hasMany(OrganizationsHasContacts::className(), ['contacts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['id' => 'organizations_id'])->viaTable('organizations_has_contacts', ['contacts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasContacts()
    {
        return $this->hasMany(UserHasContacts::className(), ['contacts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_contacts', ['contacts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasContacts()
    {
        return $this->hasMany(VacanciesHasContacts::className(), ['contacts_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['id' => 'vacancies_id'])->viaTable('vacancies_has_contacts', ['contacts_id' => 'id']);
    }
}
