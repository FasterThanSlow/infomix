<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations_has_contacts".
 *
 * @property string $organizations_id
 * @property string $contacts_id
 *
 * @property Contacts $contacts
 * @property Organizations $organizations
 */
class OrganizationsHasContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizations_has_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organizations_id', 'contacts_id'], 'required'],
            [['organizations_id', 'contacts_id'], 'integer'],
            [['contacts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacts::className(), 'targetAttribute' => ['contacts_id' => 'id']],
            [['organizations_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organizations_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'organizations_id' => 'Organizations ID',
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
    public function getOrganizations()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organizations_id']);
    }
}
