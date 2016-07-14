<?php

namespace frontend\modules\newborn7\models;

use Yii;

/**
 * This is the model class for table "lib_province".
 *
 * @property integer $id
 * @property string $province_code
 * @property string $name
 * @property integer $geo_id
 */
class Province extends \yii\db\ActiveRecord
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

    /**
     * @inheritdoc
     * @return ProvinceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProvinceQuery(get_called_class());
    }
}
