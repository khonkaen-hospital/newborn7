<?php

namespace frontend\modules\nb\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Icdcode]].
 *
 * @see \frontend\modules\nb\models\Icdcode
 */
class IcdcodeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Icdcode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Icdcode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}