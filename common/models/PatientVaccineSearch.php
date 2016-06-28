<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PatientVaccine;

/**
 * PatientVaccineSearch represents the model behind the search form about `common\models\PatientVaccine`.
 */
class PatientVaccineSearch extends PatientVaccine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['current_weight', 'hc', 'length', 'af'], 'number'],
            [['milk', 'vaccine', 'vaccine_other', 'eye', 'eye_other', 'ear', 'ear_other', 'ult_brain', 'ref'], 'safe'],
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
        $query = PatientVaccine::find();

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
            'current_weight' => $this->current_weight,
            'hc' => $this->hc,
            'length' => $this->length,
            'af' => $this->af,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'milk', $this->milk])
            ->andFilterWhere(['like', 'vaccine', $this->vaccine])
            ->andFilterWhere(['like', 'vaccine_other', $this->vaccine_other])
            ->andFilterWhere(['like', 'eye', $this->eye])
            ->andFilterWhere(['like', 'eye_other', $this->eye_other])
            ->andFilterWhere(['like', 'ear', $this->ear])
            ->andFilterWhere(['like', 'ear_other', $this->ear_other])
            ->andFilterWhere(['like', 'ult_brain', $this->ult_brain])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
