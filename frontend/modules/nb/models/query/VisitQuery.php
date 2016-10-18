<?php

namespace frontend\modules\nb\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Visit]].
 *
 * @see \frontend\modules\nb\models\Visit
 */
class VisitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Visit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Visit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
