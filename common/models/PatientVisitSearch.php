<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PatientVisit;

/**
 * PatientVisitSearch represents the model behind the search form about `common\models\PatientVisit`.
 */
class PatientVisitSearch extends PatientVisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'visit_date', 'tsh_pku_result', 'oae_abr', 'ivh_result', 'created_at', 'updated_at', 'created_by', 'updated_by', 'appointment_no'], 'integer'],
            [['visit_id', 'hospcode_seq', 'hospcode_hn', 'tsh_pku', 'tsh_pku_date', 'oae', 'oae_date', 'oae_right', 'oae_left', 'oae_result', 'ivh_ult_brain', 'ivh_date', 'rop', 'rop_date', 'rop_result', 'rop_hosp_appointment'], 'safe'],
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
            'id' => $this->id,
            'visit_date' => $this->visit_date,
            'tsh_pku_date' => $this->tsh_pku_date,
            'tsh_pku_result' => $this->tsh_pku_result,
            'oae_date' => $this->oae_date,
            'oae_abr' => $this->oae_abr,
            'ivh_date' => $this->ivh_date,
            'ivh_result' => $this->ivh_result,
            'rop_date' => $this->rop_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'appointment_no' => $this->appointment_no,
        ]);

        $query->andFilterWhere(['like', 'visit_id', $this->visit_id])
            ->andFilterWhere(['like', 'hospcode_seq', $this->hospcode_seq])
            ->andFilterWhere(['like', 'hospcode_hn', $this->hospcode_hn])
            ->andFilterWhere(['like', 'tsh_pku', $this->tsh_pku])
            ->andFilterWhere(['like', 'oae', $this->oae])
            ->andFilterWhere(['like', 'oae_right', $this->oae_right])
            ->andFilterWhere(['like', 'oae_left', $this->oae_left])
            ->andFilterWhere(['like', 'oae_result', $this->oae_result])
            ->andFilterWhere(['like', 'ivh_ult_brain', $this->ivh_ult_brain])
            ->andFilterWhere(['like', 'rop', $this->rop])
            ->andFilterWhere(['like', 'rop_result', $this->rop_result])
            ->andFilterWhere(['like', 'rop_hosp_appointment', $this->rop_hosp_appointment]);

        return $dataProvider;
    }
}
