<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orderitems".
 *
 * @property string $uniqueID
 * @property integer $id
 * @property integer $orderNo
 * @property string $ordered_item
 * @property string $prepStatus
 */
class Orderitems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderitems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uniqueID', 'orderNo', 'ordered_item'], 'required'],
            [['orderNo'], 'integer'],
            [['prepStatus'], 'string'],
            [['uniqueID'], 'string', 'max' => 20],
            [['ordered_item'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uniqueID' => 'Unique ID',
            'id' => 'ID',
            'orderNo' => 'Order No',
            'ordered_item' => 'Ordered Item',
            'prepStatus' => 'Prep Status',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderitemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderitemsQuery(get_called_class());
    }
}
