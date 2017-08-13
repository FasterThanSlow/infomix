<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organizations;

/**
 * OrganizationsSearch represents the model behind the search form about `app\models\Organizations`.
 */
class OrganizationsSearch extends Organizations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'unp', 'cities_id', 'pictures_id'], 'integer'],
            [['institutional_legal_form', 'title', 'legal_address'], 'safe'],
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
        $query = Organizations::find();

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
            'unp' => $this->unp,
            'cities_id' => $this->cities_id,
            'pictures_id' => $this->pictures_id,
        ]);

        $query->andFilterWhere(['like', 'institutional_legal_form', $this->institutional_legal_form])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'legal_address', $this->legal_address]);

        return $dataProvider;
    }
}
