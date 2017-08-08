<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancies".
 *
 * @property string $id
 * @property string $title
 * @property double $salary
 * @property integer $is_for_student
 * @property string $description
 * @property integer $is_responseble
 * @property integer $is_contactable
 * @property string $contact_person
 * @property string $views
 * @property string $created_at
 * @property string $updated_at
 * @property string $expiriencies_id
 * @property string $education_id
 * @property string $organizations_id
 * @property string $statuses_id
 * @property string $members_id
 * @property string $cities_id
 *
 * @property FavoritesVacancies[] $favoritesVacancies
 * @property Responces[] $responces
 * @property Cities $cities
 * @property Education $education
 * @property Expiriencies $expiriencies
 * @property Members $members
 * @property Organizations $organizations
 * @property Statuses $statuses
 * @property VacanciesHasContacts[] $vacanciesHasContacts
 * @property Contacts[] $contacts
 * @property VacanciesHasEmployment[] $vacanciesHasEmployments
 * @property Employment[] $employments
 * @property VacanciesHasNatureOfWork[] $vacanciesHasNatureOfWorks
 * @property NatureOfWork[] $natureOfWorks
 * @property VacanciesHasSchedule[] $vacanciesHasSchedules
 * @property Schedule[] $schedules
 * @property VacanciesHasSpecialities[] $vacanciesHasSpecialities
 * @property Specialities[] $specialities
 * @property VacanciesLanguageSkills[] $vacanciesLanguageSkills
 */
class Vacancies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salary'], 'number'],
            [['is_for_student', 'is_responseble', 'is_contactable', 'views', 'created_at', 'updated_at', 'expiriencies_id', 'education_id', 'organizations_id', 'statuses_id', 'members_id', 'cities_id'], 'integer'],
            [['description'], 'string'],
            [['expiriencies_id', 'education_id', 'organizations_id', 'statuses_id', 'members_id', 'cities_id'], 'required'],
            [['title', 'contact_person'], 'string', 'max' => 255],
            [['cities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['cities_id' => 'id']],
            [['education_id'], 'exist', 'skipOnError' => true, 'targetClass' => Education::className(), 'targetAttribute' => ['education_id' => 'id']],
            [['expiriencies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expiriencies::className(), 'targetAttribute' => ['expiriencies_id' => 'id']],
            [['members_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['members_id' => 'id']],
            [['organizations_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['organizations_id' => 'id']],
            [['statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::className(), 'targetAttribute' => ['statuses_id' => 'id']],
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
            'salary' => 'Salary',
            'is_for_student' => 'Is For Student',
            'description' => 'Description',
            'is_responseble' => 'Is Responseble',
            'is_contactable' => 'Is Contactable',
            'contact_person' => 'Contact Person',
            'views' => 'Views',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'expiriencies_id' => 'Expiriencies ID',
            'education_id' => 'Education ID',
            'organizations_id' => 'Organizations ID',
            'statuses_id' => 'Statuses ID',
            'members_id' => 'Members ID',
            'cities_id' => 'Cities ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritesVacancies()
    {
        return $this->hasMany(FavoritesVacancies::className(), ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponces()
    {
        return $this->hasMany(Responces::className(), ['vacancies_id' => 'id']);
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
    public function getEducation()
    {
        return $this->hasOne(Education::className(), ['id' => 'education_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpiriencies()
    {
        return $this->hasOne(Expiriencies::className(), ['id' => 'expiriencies_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasOne(Members::className(), ['id' => 'members_id']);
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
    public function getStatuses()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'statuses_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasContacts()
    {
        return $this->hasMany(VacanciesHasContacts::className(), ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['id' => 'contacts_id'])->viaTable('vacancies_has_contacts', ['vacancies_id' => 'id']);
    }

    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['id' => 'addresses_id'])->viaTable('vacancies_has_addresses', ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasEmployments()
    {
        return $this->hasMany(VacanciesHasEmployment::className(), ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployments()
    {
        return $this->hasMany(Employment::className(), ['id' => 'employment_id'])->viaTable('vacancies_has_employment', ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasNatureOfWorks()
    {
        return $this->hasMany(VacanciesHasNatureOfWork::className(), ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNatureOfWorks()
    {
        return $this->hasMany(NatureOfWork::className(), ['id' => 'nature_of_work_id'])->viaTable('vacancies_has_nature_of_work', ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasSchedules()
    {
        return $this->hasMany(VacanciesHasSchedule::className(), ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['id' => 'schedule_id'])->viaTable('vacancies_has_schedule', ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesHasSpecialities()
    {
        return $this->hasMany(VacanciesHasSpecialities::className(), ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialities()
    {
        return $this->hasMany(Specialities::className(), ['id' => 'specialities_id'])->viaTable('vacancies_has_specialities', ['vacancies_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacanciesLanguageSkills()
    {
        return $this->hasMany(VacanciesLanguageSkills::className(), ['vacancies_id' => 'id']);
    }
}
