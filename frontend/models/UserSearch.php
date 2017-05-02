<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * UserSearch represents the model behind the search form about `frontend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roll_no', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'branch', 'contact', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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
        $query = User::find();

        // add conditions that should always apply here
        if(isset(yii::$app->user->identity))
        {
            $dataProvider = new ActiveDataProvider([
                 'query' => User::find()->
                    where(['roll_no' => Yii::$app->user->identity->roll_no]),  
            ]);
                return $dataProvider;
        }
        else
        {
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
                return $dataProvider;            
        }   

/*        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
*/
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'roll_no' => $this->roll_no,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'branch', $this->branch])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
