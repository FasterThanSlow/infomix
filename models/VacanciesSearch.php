<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacancies;

/**
 * VacanciesSearch represents the model behind the search form about `app\models\Vacancies`.
 */
class VacanciesSearch extends Vacancies
{
    public $schedules;
    public $employments;
    public $natureOfWorks;
    public $educations;
    public $expiriencies;
    public $salaries;
    public $period;
    public $speciality;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_for_student', 'is_responseble', 'is_contactable', 'views', 'created_at', 'updated_at', 'expiriencies_id', 'education_id', 'organizations_id', 'statuses_id', 'members_id'], 'integer'],
            [['title', 'description', 'contact_person', 'schedules', 'employments','natureOfWorks','educations','expiriencies','salaries','period','speciality'], 'safe'],
            [['salary'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Vacancies::find();
        
        $query->joinWith('schedules');
        $query->joinWith('employments');
        $query->joinWith('natureOfWorks');
        $query->joinWith('education');
        $query->joinWith('expiriencies');
        $query->joinWith('specialities');
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort'=> ['defaultOrder' => ['updated_at'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'vacancies.id' => $this->id,
            'vacancies.salary' => $this->salary,
            'vacancies.is_for_student' => $this->is_for_student,
            'vacancies.is_responseble' => $this->is_responseble,
            'vacancies.is_contactable' => $this->is_contactable,
            'vacancies.views' => $this->views,
            'vacancies.created_at' => $this->created_at,
            'vacancies.updated_at' => $this->updated_at,
            'vacancies.expiriencies_id' => $this->expiriencies_id,
            'vacancies.education_id' => $this->education_id,
            'vacancies.organizations_id' => $this->organizations_id,
            'vacancies.statuses_id' => $this->statuses_id,
            'vacancies.members_id' => $this->members_id,
            'schedule.id' => $this->schedules,
            'employment.id' => $this->employments,
            'nature_of_work.id' => $this->natureOfWorks,
            'education.id' => $this->educations,
            'expiriencies.id' => $this->expiriencies,
            'specialities.id' => $this->speciality
        ]);
        
        if(!empty($this->period)){
            if($this->period != 0){
                $query->andFilterWhere(['>=', 'vacancies.updated_at',time() - $this->period]);
            }
        }
        
        if(!empty($this->salaries)){
            switch ($this->salaries){
                case 'null':
                    $query->andFilterWhere(['vacancies.salary' => null]);
                    break;
                default :
                    $query->andFilterWhere(['>=' , 'vacancies.salary' ,$this->salaries]);
                    break;
            }
        }
        
     
        $query->andFilterWhere(['like', 'vacancies.title', $this->title])
            ->andFilterWhere(['like', 'vacancies.description', $this->description])
            ->andFilterWhere(['like', 'vacancies.contact_person', $this->contact_person]);

        return $dataProvider;
    }
}
