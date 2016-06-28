<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `common\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_card', 'sex', 'dead', 'exp_age', 'los', 'province', 'amphoe', 'district', 'postcode', 'phone', 'mobile', 'id_card_mum', 'id_card_papa', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['hospcode', 'hn', 'an', 'first_name', 'last_name', 'birth_date', 'at_birth', 'ward_admit', 'refer_receive', 'refer_to', 'exp', 'address', 'first_name_mum', 'last_name_mum', 'hn_mum', 'an_mum', 'age_mum', 'first_name_papa', 'last_name_papa'], 'safe'],
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
            'id' => $this->id,
            'id_card' => $this->id_card,
            'sex' => $this->sex,
            'birth_date' => $this->birth_date,
            'at_birth' => $this->at_birth,
            'dead' => $this->dead,
            'exp' => $this->exp,
            'exp_age' => $this->exp_age,
            'los' => $this->los,
            'province' => $this->province,
            'amphoe' => $this->amphoe,
            'district' => $this->district,
            'postcode' => $this->postcode,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'id_card_mum' => $this->id_card_mum,
            'id_card_papa' => $this->id_card_papa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'ward_admit', $this->ward_admit])
            ->andFilterWhere(['like', 'refer_receive', $this->refer_receive])
            ->andFilterWhere(['like', 'refer_to', $this->refer_to])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'first_name_mum', $this->first_name_mum])
            ->andFilterWhere(['like', 'last_name_mum', $this->last_name_mum])
            ->andFilterWhere(['like', 'hn_mum', $this->hn_mum])
            ->andFilterWhere(['like', 'an_mum', $this->an_mum])
            ->andFilterWhere(['like', 'age_mum', $this->age_mum])
            ->andFilterWhere(['like', 'first_name_papa', $this->first_name_papa])
            ->andFilterWhere(['like', 'last_name_papa', $this->last_name_papa]);

        return $dataProvider;
    }
}
