<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\newborn7\models\PatientVisit;

/**
 * PatientVisitSearch represents the model behind the search form about `frontend\modules\newborn7\models\PatientVisit`.
 */
class PatientVisitSearch extends PatientVisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id', 'age', 'bp_max', 'bp_min'], 'integer'],
            [['seq', 'hospcode', 'hn', 'date', 'clinic', 'pttype', 'age_type', 'result', 'referin', 'referout', 'inp_id', 'lastupdate'], 'safe'],
            [['head_size', 'height', 'weight', 'waist'], 'number'],
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
        $query = PatientVisit::find();

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
            'visit_id' => $this->visit_id,
            'date' => $this->date,
            'age' => $this->age,
            'head_size' => $this->head_size,
            'height' => $this->height,
            'weight' => $this->weight,
            'waist' => $this->waist,
            'bp_max' => $this->bp_max,
            'bp_min' => $this->bp_min,
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'seq', $this->seq])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'clinic', $this->clinic])
            ->andFilterWhere(['like', 'pttype', $this->pttype])
            ->andFilterWhere(['like', 'age_type', $this->age_type])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'referin', $this->referin])
            ->andFilterWhere(['like', 'referout', $this->referout])
            ->andFilterWhere(['like', 'inp_id', $this->inp_id]);

        return $dataProvider;
    }
}
