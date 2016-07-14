<?php

namespace frontend\modules\newborn7\models;

/**
 * This is the ActiveQuery class for [[PatientVisit]].
 *
 * @see PatientVisit
 */
class PatientVisitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PatientVisit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PatientVisit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
