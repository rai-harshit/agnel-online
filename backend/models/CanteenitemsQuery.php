<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Canteenitems]].
 *
 * @see Canteenitems
 */
class CanteenitemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Canteenitems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Canteenitems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
