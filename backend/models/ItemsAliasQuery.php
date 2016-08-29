<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[ItemsAlias]].
 *
 * @see ItemsAlias
 */
class ItemsAliasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ItemsAlias[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemsAlias|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
