<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacancies;

/**
 * VacanciesSearch represents the model behind the search form about `app\models\Vacancies`.
 */
class VacanciesSearch extends Vacancies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_for_student', 'is_responseble', 'is_contactable', 'views', 'created_at', 'updated_at', 'expiriencies_id', 'education_id', 'organizations_id', 'statuses_id', 'members_id', 'cities_id'], 'integer'],
            [['title', 'description', 'contact_person'], 'safe'],
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
            'salary' => $this->salary,
            'is_for_student' => $this->is_for_student,
            'is_responseble' => $this->is_responseble,
            'is_contactable' => $this->is_contactable,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'expiriencies_id' => $this->expiriencies_id,
            'education_id' => $this->education_id,
            'organizations_id' => $this->organizations_id,
            'statuses_id' => $this->statuses_id,
            'members_id' => $this->members_id,
            'cities_id' => $this->cities_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person]);

        return $dataProvider;
    }
}
