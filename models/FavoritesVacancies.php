<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorites_vacancies".
 *
 * @property string $id
 * @property integer $date
 * @property string $vacancies_id
 * @property string $user_id
 *
 * @property User $user
 * @property Vacancies $vacancies
 */
class FavoritesVacancies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favorites_vacancies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'vacancies_id', 'user_id'], 'integer'],
            [['vacancies_id', 'user_id'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['vacancies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancies::className(), 'targetAttribute' => ['vacancies_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'vacancies_id' => 'Vacancies ID',
            'user_id' => 'User ID',
        ];
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
        return $this->hasOne(Vacancies::className(), ['id' => 'vacancies_id']);
    }
}
