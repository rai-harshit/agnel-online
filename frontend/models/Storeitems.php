<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "storeitems".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $status
 */
class Storeitems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'storeitems';
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
            [['name'], 'string', 'max' => 45],
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
     * @return StoreitemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StoreitemsQuery(get_called_class());
    }


}

?>

