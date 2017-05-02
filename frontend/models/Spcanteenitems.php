<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "spcanteenitems".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $status
 */
class Spcanteenitems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spcanteenitems';
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
     * @return CantspitemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpcanteenitemsQuery(get_called_class());
    }
}
