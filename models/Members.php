<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property string $id
 * @property string $post
 * @property string $organizations_id
 * @property string $user_id
 *
 * @property FavoritesSummariesSections[] $favoritesSummariesSections
 * @property Organizations $organizations
 * @property User $user
 * @property Vacancies[] $vacancies
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organizations_id', 'user_id'], 'required'],
            [['organizations_id', 'user_id'], 'integer'],
            [['post'], 'string', 'max' => 255],
            [['organizations_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organizations_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => user\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post' => 'Post',
            'organizations_id' => 'Organizations ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritesSummariesSections()
    {
        return $this->hasMany(FavoritesSummariesSections::className(), ['members_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organizations_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancies::className(), ['members_id' => 'id']);
    }
}
