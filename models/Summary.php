<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "summary".
 *
 * @property string $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birth_date
 * @property integer $sex
 * @property integer $childrens
 * @property string $career_objective
 * @property double $salary
 * @property integer $driver_license
 * @property integer $availability_of_car
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $views
 * @property string $user_id
 * @property string $statuses_id
 * @property string $cities_id
 * @property string $pictures_id
 * @property string $marital_statuses_id
 * @property string $business_trips_id
 * @property string $relocation_id
 * @property string $get_to_work_id
 * @property string $expiriencies_id
 * @property string $education_id
 * @property string $computer_skills_level_id
 *
 * @property FavoritesSummaries[] $favoritesSummaries
 * @property Responces[] $responces
 * @property SummariesLanguageSkills[] $summariesLanguageSkills
 * @property BusinessTrips $businessTrips
 * @property Cities $cities
 * @property ComputerSkillsLevel $computerSkillsLevel
 * @property Education $education
 * @property Expiriencies $expiriencies
 * @property GetToWork $getToWork
 * @property MaritalStatuses $maritalStatuses
 * @property Pictures $pictures
 * @property Relocation $relocation
 * @property Statuses $statuses
 * @property User $user
 * @property SummaryHasCourses[] $summaryHasCourses
 * @property Courses[] $courses
 * @property SummaryHasEducationalEstablishments[] $summaryHasEducationalEstablishments
 * @property EducationalEstablishments[] $educationalEstablishments
 * @property SummaryHasEmployment[] $summaryHasEmployments
 * @property Employment[] $employments
 * @property SummaryHasNatureOfWork[] $summaryHasNatureOfWorks
 * @property NatureOfWork[] $natureOfWorks
 * @property SummaryHasPortfolioLinks[] $summaryHasPortfolioLinks
 * @property PortfolioLinks[] $portfolioLinks
 * @property SummaryHasProgrammSkills[] $summaryHasProgrammSkills
 * @property ProgrammSkills[] $programmSkills
 * @property SummaryHasSchedule[] $summaryHasSchedules
 * @property Schedule[] $schedules
 * @property SummaryHasSocialLinks[] $summaryHasSocialLinks
 * @property SocialLinks[] $socialLinks
 * @property SummaryHasSpecialities[] $summaryHasSpecialities
 * @property Specialities[] $specialities
 */
class Summary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth_date', 'sex', 'childrens', 'driver_license', 'availability_of_car', 'created_at', 'updated_at', 'views', 'user_id', 'statuses_id', 'cities_id', 'pictures_id', 'marital_statuses_id', 'business_trips_id', 'relocation_id', 'get_to_work_id', 'expiriencies_id', 'education_id', 'computer_skills_level_id'], 'integer'],
            [['salary'], 'number'],
            [['description'], 'string'],
            [['user_id', 'statuses_id', 'cities_id', 'pictures_id', 'marital_statuses_id', 'business_trips_id', 'relocation_id', 'get_to_work_id', 'expiriencies_id', 'education_id', 'computer_skills_level_id'], 'required'],
            [['first_name', 'middle_name', 'last_name', 'career_objective'], 'string', 'max' => 255],
            [['business_trips_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessTrips::className(), 'targetAttribute' => ['business_trips_id' => 'id']],
            [['cities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['cities_id' => 'id']],
            [['computer_skills_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => ComputerSkillsLevel::className(), 'targetAttribute' => ['computer_skills_level_id' => 'id']],
            [['education_id'], 'exist', 'skipOnError' => true, 'targetClass' => Education::className(), 'targetAttribute' => ['education_id' => 'id']],
            [['expiriencies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expiriencies::className(), 'targetAttribute' => ['expiriencies_id' => 'id']],
            [['get_to_work_id'], 'exist', 'skipOnError' => true, 'targetClass' => GetToWork::className(), 'targetAttribute' => ['get_to_work_id' => 'id']],
            [['marital_statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaritalStatuses::className(), 'targetAttribute' => ['marital_statuses_id' => 'id']],
            [['pictures_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pictures::className(), 'targetAttribute' => ['pictures_id' => 'id']],
            [['relocation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Relocation::className(), 'targetAttribute' => ['relocation_id' => 'id']],
            [['statuses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::className(), 'targetAttribute' => ['statuses_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
            'sex' => 'Sex',
            'childrens' => 'Childrens',
            'career_objective' => 'Career Objective',
            'salary' => 'Salary',
            'driver_license' => 'Driver License',
            'availability_of_car' => 'Availability Of Car',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'views' => 'Views',
            'user_id' => 'User ID',
            'statuses_id' => 'Statuses ID',
            'cities_id' => 'Cities ID',
            'pictures_id' => 'Pictures ID',
            'marital_statuses_id' => 'Marital Statuses ID',
            'business_trips_id' => 'Business Trips ID',
            'relocation_id' => 'Relocation ID',
            'get_to_work_id' => 'Get To Work ID',
            'expiriencies_id' => 'Expiriencies ID',
            'education_id' => 'Education ID',
            'computer_skills_level_id' => 'Computer Skills Level ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritesSummaries()
    {
        return $this->hasMany(FavoritesSummaries::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponces()
    {
        return $this->hasMany(Responces::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummariesLanguageSkills()
    {
        return $this->hasMany(SummariesLanguageSkills::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessTrips()
    {
        return $this->hasOne(BusinessTrips::className(), ['id' => 'business_trips_id']);
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
    public function getComputerSkillsLevel()
    {
        return $this->hasOne(ComputerSkillsLevel::className(), ['id' => 'computer_skills_level_id']);
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
    public function getGetToWork()
    {
        return $this->hasOne(GetToWork::className(), ['id' => 'get_to_work_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaritalStatuses()
    {
        return $this->hasOne(MaritalStatuses::className(), ['id' => 'marital_statuses_id']);
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
    public function getRelocation()
    {
        return $this->hasOne(Relocation::className(), ['id' => 'relocation_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasCourses()
    {
        return $this->hasMany(SummaryHasCourses::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['id' => 'courses_id'])->viaTable('summary_has_courses', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasEducationalEstablishments()
    {
        return $this->hasMany(SummaryHasEducationalEstablishments::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationalEstablishments()
    {
        return $this->hasMany(EducationalEstablishments::className(), ['id' => 'educational_establishments_id'])->viaTable('summary_has_educational_establishments', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasEmployments()
    {
        return $this->hasMany(SummaryHasEmployment::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployments()
    {
        return $this->hasMany(Employment::className(), ['id' => 'employment_id'])->viaTable('summary_has_employment', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasNatureOfWorks()
    {
        return $this->hasMany(SummaryHasNatureOfWork::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNatureOfWorks()
    {
        return $this->hasMany(NatureOfWork::className(), ['id' => 'nature_of_work_id'])->viaTable('summary_has_nature_of_work', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasPortfolioLinks()
    {
        return $this->hasMany(SummaryHasPortfolioLinks::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioLinks()
    {
        return $this->hasMany(PortfolioLinks::className(), ['id' => 'portfolio_links_id'])->viaTable('summary_has_portfolio_links', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasProgrammSkills()
    {
        return $this->hasMany(SummaryHasProgrammSkills::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammSkills()
    {
        return $this->hasMany(ProgrammSkills::className(), ['id' => 'programm_skills_id'])->viaTable('summary_has_programm_skills', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasSchedules()
    {
        return $this->hasMany(SummaryHasSchedule::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['id' => 'schedule_id'])->viaTable('summary_has_schedule', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasSocialLinks()
    {
        return $this->hasMany(SummaryHasSocialLinks::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialLinks()
    {
        return $this->hasMany(SocialLinks::className(), ['id' => 'social_links_id'])->viaTable('summary_has_social_links', ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaryHasSpecialities()
    {
        return $this->hasMany(SummaryHasSpecialities::className(), ['summary_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialities()
    {
        return $this->hasMany(Specialities::className(), ['id' => 'specialities_id'])->viaTable('summary_has_specialities', ['summary_id' => 'id']);
    }
}
