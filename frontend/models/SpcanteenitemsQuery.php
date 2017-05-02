<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Spcanteenitems]].
 *
 * @see Spcanteenitems
 */
class SpcanteenitemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Spcanteenitems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Spcanteenitems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
