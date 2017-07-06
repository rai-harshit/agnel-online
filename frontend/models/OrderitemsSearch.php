<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Orderitems;

/**
 * OrderitemsSearch represents the model behind the search form about `frontend\models\Orderitems`.
 */
class OrderitemsSearch extends Orderitems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniqueID', 'ordered_item', 'prepStatus'], 'safe'],
            [['id', 'orderNo'], 'integer'],
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
        $query = Orderitems::find();

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
            'orderNo' => $this->orderNo,
        ]);

        $query->andFilterWhere(['like', 'uniqueID', $this->uniqueID])
            ->andFilterWhere(['like', 'ordered_item', $this->ordered_item])
            ->andFilterWhere(['like', 'prepStatus', $this->prepStatus]);

        return $dataProvider;
    }
}
