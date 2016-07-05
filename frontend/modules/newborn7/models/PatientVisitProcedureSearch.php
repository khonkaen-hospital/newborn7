<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\newborn7\models\PatientVisitProcedure;

/**
 * PatientVisitProcedureSearch represents the model behind the search form about `frontend\modules\newborn7\models\PatientVisitProcedure`.
 */
class PatientVisitProcedureSearch extends PatientVisitProcedure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id'], 'integer'],
            [['procedcode', 'typegiag', 'typeicd', 'diag', 'lastupdate'], 'safe'],
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
        $query = PatientVisitProcedure::find();

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
            'lastupdate' => $this->lastupdate,
        ]);

        $query->andFilterWhere(['like', 'procedcode', $this->procedcode])
            ->andFilterWhere(['like', 'typegiag', $this->typegiag])
            ->andFilterWhere(['like', 'typeicd', $this->typeicd])
            ->andFilterWhere(['like', 'diag', $this->diag]);

        return $dataProvider;
    }
}
