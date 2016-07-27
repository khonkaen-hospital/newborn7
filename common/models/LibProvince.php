<?php

namespace common\models;

use frontend\modules\newborn7\models\Patient;
use Yii;

/**
 * This is the model class for table "lib_province".
 *
 * @property integer $id
 * @property string $province_code
 * @property string $name
 * @property integer $geo_id
 */
class LibProvince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_code', 'name'], 'required'],
            [['geo_id'], 'integer'],
            [['province_code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_code' => 'Province Code',
            'name' => 'Name',
            'geo_id' => 'Geo ID',
        ];
    }

    public function getPatient()
    {
        return $this->hasMany(Patient::className(), ['prov' => 'province_code']);
    }

}
