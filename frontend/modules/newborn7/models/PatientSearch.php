<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\newborn7\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `frontend\modules\newborn7\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'mother_age', 'moi_checked', 'weight', 'ga', 'apgar'], 'integer'],
            [['hospcode', 'prov', 'hn', 'an', 'seq', 'prename', 'fname', 'mname', 'lname', 'cid', 'dob', 'sex', 'dead', 'mother_cid', 'mother_name', 'mother_an', 'father_cid', 'father_name', 'nation', 'address', 'moo', 'soi', 'road', 'ban', 'addcode', 'zip', 'tel', 'mobile', 'serviced', 'lr_type', 'remark', 'inp_id', 'lastupdate'], 'safe'],
            [['high'], 'number'],
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
        $query = Patient::find();

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
            'patient_id' => $this->patient_id,
            'dob' => $this->dob,
            'dead' => $this->dead,
            'mother_age' => $this->mother_age,
            'moi_checked' => $this->moi_checked,
            'high' => $this->high,
            'weight' => $this->weight,
            'ga' => $this->ga,
            'apgar' => $this->apgar,
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'seq', $this->seq])
            ->andFilterWhere(['like', 'prename', $this->prename])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'mname', $this->mname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'mother_cid', $this->mother_cid])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'mother_an', $this->mother_an])
            ->andFilterWhere(['like', 'father_cid', $this->father_cid])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'moo', $this->moo])
            ->andFilterWhere(['like', 'soi', $this->soi])
            ->andFilterWhere(['like', 'road', $this->road])
            ->andFilterWhere(['like', 'ban', $this->ban])
            ->andFilterWhere(['like', 'addcode', $this->addcode])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'serviced', $this->serviced])
            ->andFilterWhere(['like', 'lr_type', $this->lr_type])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'inp_id', $this->inp_id]);

        return $dataProvider;
    }
}
