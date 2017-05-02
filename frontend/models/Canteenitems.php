<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "canteenitems".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $status
 */
class Canteenitems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'canteenitems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'price', 'status'], 'required'],
            [['id', 'price'], 'integer'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return CanteenitemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CanteenitemsQuery(get_called_class());
    }
}
