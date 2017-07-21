<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorites_summaries_sections".
 *
 * @property string $id
 * @property string $title
 * @property string $members_id
 *
 * @property FavoritesSummaries[] $favoritesSummaries
 * @property Members $members
 */
class FavoritesSummariesSections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorites_summaries_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['members_id'], 'required'],
            [['members_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['members_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['members_id' => 'id']],
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
            'members_id' => 'Members ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritesSummaries()
    {
        return $this->hasMany(FavoritesSummaries::className(), ['favorites_summaries_sections_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasOne(Members::className(), ['id' => 'members_id']);
    }
}
