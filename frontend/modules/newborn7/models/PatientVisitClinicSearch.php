<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\newborn7\models\PatientVisitClinic;

/**
 * PatientVisitClinicSearch represents the model behind the search form about `frontend\modules\newborn7\models\PatientVisitClinic`.
 */
class PatientVisitClinicSearch extends PatientVisitClinic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id', 'ga', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['hospcode', 'hn', 'seq', 'caregivers', 'clinic_date', 'milk', 'milk_other', 'vaccine', 'vaccine_other', 'eye', 'eye_other', 'ear', 'ear_other', 'ult_brain', 'ult_brain_result'], 'safe'],
            [['birth_weight', 'current_weight', 'hc', 'length', 'af'], 'number'],
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
        $query = PatientVisitClinic::find();

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
            'ga' => $this->ga,
            'birth_weight' => $this->birth_weight,
            'current_weight' => $this->current_weight,
            'hc' => $this->hc,
            'length' => $this->length,
            'af' => $this->af,
            'clinic_date' => $this->clinic_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'seq', $this->seq])
            ->andFilterWhere(['like', 'caregivers', $this->caregivers])
            ->andFilterWhere(['like', 'milk', $this->milk])
            ->andFilterWhere(['like', 'milk_other', $this->milk_other])
            ->andFilterWhere(['like', 'vaccine', $this->vaccine])
            ->andFilterWhere(['like', 'vaccine_other', $this->vaccine_other])
            ->andFilterWhere(['like', 'eye', $this->eye])
            ->andFilterWhere(['like', 'eye_other', $this->eye_other])
            ->andFilterWhere(['like', 'ear', $this->ear])
            ->andFilterWhere(['like', 'ear_other', $this->ear_other])
            ->andFilterWhere(['like', 'ult_brain', $this->ult_brain])
            ->andFilterWhere(['like', 'ult_brain_result', $this->ult_brain_result]);

        return $dataProvider;
    }
}
