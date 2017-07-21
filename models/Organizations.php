<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property string $id
 * @property string $institutional_legal_form
 * @property string $title
 * @property string $unp
 * @property string $legal_address
 * @property string $cities_id
 * @property string $pictures_id
 *
 * @property Members[] $members
 * @property Cities $cities
 * @property Pictures $pictures
 * @property OrganizationsHasAddresses[] $organizationsHasAddresses
 * @property Addresses[] $addresses
 * @property OrganizationsHasContacts[] $organizationsHasContacts
 * @property Contacts[] $contacts
 * @property Vacancies[] $vacancies
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unp', 'cities_id', 'pictures_id'], 'integer'],
            [['cities_id', 'pictures_id'], 'required'],
            [['institutional_legal_form', 'title', 'legal_address'], 'string', 'max' => 255],
            [['cities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['cities_id' => 'id(11)']],
            [['pictures_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pictures::className(), 'targetAttribute' => ['pictures_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institutional_legal_form' => 'Institutional Legal Form',
            'title' => 'Title',
            'unp' => 'Unp',
            'legal_address' => 'Legal Address',
            'cities_id' => 'Cities ID',
            'pictures_id' => 'Pictures ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::className(), ['organizations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasOne(Cities::className(), ['id' => 'cities_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPictures()
    {
        return $this->hasOne(Pictures::className(), ['id' => 'pictures_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsHasAddresses()
    {
        return $this->hasMany(OrganizationsHasAddresses::className(), ['organizations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['id' => 'addresses_id'])->viaTable('organizations_has_addresses', ['organizations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsHasContacts()
    {
        return $this->hasMany(OrganizationsHasContacts::className(), ['organizations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['id' => 'contacts_id'])->viaTable('organizations_has_contacts', ['organizations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['organizations_id' => 'id']);
    }
}
