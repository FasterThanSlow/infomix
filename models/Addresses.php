<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property string $id
 * @property string $title
 * @property string $street
 * @property string $house
 * @property string $office
 * @property string $cities_id
 * @property string $coordinates_id
 *
 * @property Cities $cities
 * @property Coordinates $coordinates
 * @property OrganizationsHasAddresses[] $organizationsHasAddresses
 * @property Organizations[] $organizations
 * @property User[] $users
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cities_id', 'coordinates_id'], 'required'],
            [['cities_id', 'coordinates_id'], 'integer'],
            [['title', 'street', 'house', 'office'], 'string', 'max' => 255],
            [['cities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['cities_id' => 'id(11)']],
            [['coordinates_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coordinates::className(), 'targetAttribute' => ['coordinates_id' => 'id']],
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
            'street' => 'Street',
            'house' => 'House',
            'office' => 'Office',
            'cities_id' => 'Cities ID',
            'coordinates_id' => 'Coordinates ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasOne(Cities::className(), ['id(11)' => 'cities_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordinates()
    {
        return $this->hasOne(Coordinates::className(), ['id' => 'coordinates_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsHasAddresses()
    {
        return $this->hasMany(OrganizationsHasAddresses::className(), ['addresses_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['id' => 'organizations_id'])->viaTable('organizations_has_addresses', ['addresses_id' => 'id']);
    }

    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['id' => 'vacancies_id'])->viaTable('vacancies_has_addresses', ['addresses_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['addresses_id' => 'id']);
    }
}
