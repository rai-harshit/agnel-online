<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Storeitems]].
 *
 * @see Storeitems
 */
class StoreitemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Storeitems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Storeitems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
