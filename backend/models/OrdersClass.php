<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orders;

/**
 * OrdersClass represents the model behind the search form about `backend\models\Orders`.
 */
class OrdersClass extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderNo', 'rollNo', 'itemsCount', 'grandTotal'], 'integer'],
            [['dateTime', 'uniqueID', 'orderStatus'], 'safe'],
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
        $query = Orders::find();

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
            'orderNo' => $this->orderNo,
            'dateTime' => $this->dateTime,
            'rollNo' => $this->rollNo,
            'itemsCount' => $this->itemsCount,
            'grandTotal' => $this->grandTotal,
        ]);

        $query->andFilterWhere(['like', 'uniqueID', $this->uniqueID])
            ->andFilterWhere(['like', 'orderStatus', $this->orderStatus]);

        return $dataProvider;
    }
}
