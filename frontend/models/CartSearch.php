<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cart;

/**
 * CartSearch represents the model behind the search form about `frontend\models\Cart`.
 */
class CartSearch extends Cart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rollNo', 'itemPrice'], 'integer'],
            [['dateTime', 'itemId', 'itemName'], 'safe'],
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
        $query = Cart::find();

        // add conditions that should always apply here


        if(isset(Yii::$app->user->identity))
        {
            $dataProvider = new ActiveDataProvider([
                'query' => Cart::find()->
                          where(['rollNo' => Yii::$app->user->identity->roll_no ]),
            ]);
        }

        else
        {   
            $dataProvider = new ActiveDataProvider([
            'query' => $query,]);
            return $dataProvider;
        }



 /*       $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
*/
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dateTime' => $this->dateTime,
            'rollNo' => $this->rollNo,
            'itemPrice' => $this->itemPrice,
        ]);

        $query->andFilterWhere(['like', 'itemId', $this->itemId])
            ->andFilterWhere(['like', 'itemName', $this->itemName]);

        return $dataProvider;
    }
}
