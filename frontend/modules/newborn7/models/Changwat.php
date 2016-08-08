<?php

namespace frontend\modules\newborn7\models;

use Yii;
use frontend\modules\newborn7\models\Address;

/**
 * This is the model class for table "lib_address".
 *
 * @property integer $ref
 * @property string $code
 * @property string $abbr
 * @property string $name
 * @property string $name2
 * @property string $name_full
 */
class Changwat extends Address
{
    const TYPE = 'changwat';

    public function init()
    {
        $this->type = self::TYPE;
        parent::init();
    }

    public static function find()
    {
        return new AddressQuery(get_called_class(), ['type' => self::TYPE]);
    }
}
