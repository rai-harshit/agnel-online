<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $orderNo
 * @property string $dateTime
 * @property integer $rollNo
 * @property integer $itemsCount
 * @property integer $grandTotal
 * @property string $uniqueID
 * @property string $orderStatus
 *
 * @property User $rollNo0
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateTime', 'rollNo', 'itemsCount', 'grandTotal', 'uniqueID'], 'required'],
            [['dateTime'], 'safe'],
            [['rollNo', 'itemsCount', 'grandTotal'], 'integer'],
            [['orderStatus'], 'string'],
            [['uniqueID'], 'string', 'max' => 10],
            [['uniqueID'], 'unique'],
            [['rollNo'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['rollNo' => 'roll_no']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderNo' => 'Order No',
            'dateTime' => 'Date Time',
            'rollNo' => 'Roll No',
            'itemsCount' => 'Items Count',
            'grandTotal' => 'Grand Total',
            'uniqueID' => 'Unique ID',
            'orderStatus' => 'Order Status',
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
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
