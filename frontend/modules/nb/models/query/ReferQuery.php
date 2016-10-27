<?php

namespace frontend\modules\nb\models\query;

use Yii;
/**
 * This is the ActiveQuery class for [[\frontend\modules\nb\models\Refer]].
 *
 * @see \frontend\modules\nb\models\Refer
 */
class ReferQuery extends \yii\db\ActiveQuery
{
    public function byHospcode($code=null)
    {
        return $this->andWhere([
          'hospcode' => $code == null ? Yii::$app->user->identity->profile->hcode : $code
        ]);
    }

    public function byReferToHospcode($code=null)
    {
        return $this->andWhere([
          'refer_to' => $code == null ? Yii::$app->user->identity->profile->hcode : $code
        ]);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Refer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\Refer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
