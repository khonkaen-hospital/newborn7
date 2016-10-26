<?php

namespace frontend\modules\nb\modules\api\models;

/**
 * This is the ActiveQuery class for [[Icdcode]].
 *
 * @see Icdcode
 */
class IcdcodeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Icdcode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Icdcode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
