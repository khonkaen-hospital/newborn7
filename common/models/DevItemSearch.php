<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DevItem;

/**
 * DevItemSearch represents the model behind the search form about `common\models\DevItem`.
 */
class DevItemSearch extends DevItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ref', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['code_item', 'item_name', 'unused'], 'safe'],
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
        $query = DevItem::find();

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
            'ref' => $this->ref,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'code_item', $this->code_item])
            ->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
