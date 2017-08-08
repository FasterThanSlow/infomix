<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Summary;

/**
 * SummarySearch represents the model behind the search form about `app\models\Summary`.
 */
class SummarySearch extends Summary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'birth_date', 'sex', 'childrens', 'driver_license', 'availability_of_car', 'created_at', 'updated_at', 'views', 'user_id', 'statuses_id', 'cities_id', 'pictures_id', 'marital_statuses_id', 'business_trips_id', 'relocation_id', 'get_to_work_id', 'expiriencies_id', 'education_id', 'computer_skills_level_id'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'career_objective', 'description'], 'safe'],
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
        $query = Summary::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birth_date' => $this->birth_date,
            'sex' => $this->sex,
            'childrens' => $this->childrens,
            'salary' => $this->salary,
            'driver_license' => $this->driver_license,
            'availability_of_car' => $this->availability_of_car,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'views' => $this->views,
            'user_id' => $this->user_id,
            'statuses_id' => $this->statuses_id,
            'cities_id' => $this->cities_id,
            'pictures_id' => $this->pictures_id,
            'marital_statuses_id' => $this->marital_statuses_id,
            'business_trips_id' => $this->business_trips_id,
            'relocation_id' => $this->relocation_id,
            'get_to_work_id' => $this->get_to_work_id,
            'expiriencies_id' => $this->expiriencies_id,
            'education_id' => $this->education_id,
            'computer_skills_level_id' => $this->computer_skills_level_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'career_objective', $this->career_objective])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
