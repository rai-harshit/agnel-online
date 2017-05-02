<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property string $dateTime
 * @property integer $rollNo
 * @property string $itemId
 * @property string $itemName
 * @property integer $itemPrice
 *
 * @property User $rollNo0
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateTime', 'rollNo', 'itemId', 'itemName', 'itemPrice'], 'required'],
            [['dateTime'], 'safe'],
            [['rollNo', 'itemPrice'], 'integer'],
            [['itemId'], 'string', 'max' => 20],
            [['itemName'], 'string', 'max' => 50],
            [['rollNo'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['rollNo' => 'roll_no']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateTime' => 'Date Time',
            'rollNo' => 'Roll No',
            'itemId' => 'Item ID',
            'itemName' => 'Item Name',
            'itemPrice' => 'Item Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRollNo0()
    {
        return $this->hasOne(User::className(), ['roll_no' => 'rollNo']);
    }

    /**
     * @inheritdoc
     * @return CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartQuery(get_called_class());
    }
}
