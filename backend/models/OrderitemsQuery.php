<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Orderitems]].
 *
 * @see Orderitems
 */
class OrderitemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Orderitems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Orderitems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
