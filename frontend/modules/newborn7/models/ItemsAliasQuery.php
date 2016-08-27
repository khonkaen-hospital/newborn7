<?php

namespace frontend\modules\newborn7\models;


/**
 * This is the ActiveQuery class for [[ItemsAlias]].
 *
 * @see ItemsAlias
 */
class ItemsAliasQuery extends \yii\db\ActiveQuery
{
    public function load($key)
    {
        $items =  $this->select('value')->where(['group' => $key])->indexBy('key')->column();
        return ($items == null)? [] : $items;
    }

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
