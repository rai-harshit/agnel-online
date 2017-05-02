<?php

namespace frontend\models;

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
            [['uniqueID'], 'string', 'max' => 8],
            [['uniqueID'], 'unique'],
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
        ];
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
