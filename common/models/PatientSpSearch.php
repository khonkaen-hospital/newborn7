<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PatientSp;

/**
 * PatientSpSearch represents the model behind the search form about `common\models\PatientSp`.
 */
class PatientSpSearch extends PatientSp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'calve_status', 'ga', 'lr_type', 'dexa', 'dose_brufen', 'dose_bt', 'htc', 'dtx', 'resuscltate', 'ppv', 'cpr', 'et_tube_status', 'uvc', 'et_tube', 'o2', 'pdx', 'patient_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['patient_sp_code', 'apgar', 'date_of_resuscltate', 'time_of_resuscltate', 'dx', 'dx_other', 'comp', 'comp_other', 'proc', 'proc_other', 'hospcode'], 'safe'],
            [['weigh'], 'number'],
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
        $query = PatientSp::find();

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
            'calve_status' => $this->calve_status,
            'weigh' => $this->weigh,
            'ga' => $this->ga,
            'apgar' => $this->apgar,
            'lr_type' => $this->lr_type,
            'dexa' => $this->dexa,
            'dose_brufen' => $this->dose_brufen,
            'dose_bt' => $this->dose_bt,
            'htc' => $this->htc,
            'dtx' => $this->dtx,
            'resuscltate' => $this->resuscltate,
            'date_of_resuscltate' => $this->date_of_resuscltate,
            'time_of_resuscltate' => $this->time_of_resuscltate,
            'ppv' => $this->ppv,
            'cpr' => $this->cpr,
            'et_tube_status' => $this->et_tube_status,
            'uvc' => $this->uvc,
            'et_tube' => $this->et_tube,
            'o2' => $this->o2,
            'pdx' => $this->pdx,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'patient_sp_code', $this->patient_sp_code])
            ->andFilterWhere(['like', 'dx', $this->dx])
            ->andFilterWhere(['like', 'dx_other', $this->dx_other])
            ->andFilterWhere(['like', 'comp', $this->comp])
            ->andFilterWhere(['like', 'comp_other', $this->comp_other])
            ->andFilterWhere(['like', 'proc', $this->proc])
            ->andFilterWhere(['like', 'proc_other', $this->proc_other])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode]);

        return $dataProvider;
    }
}
