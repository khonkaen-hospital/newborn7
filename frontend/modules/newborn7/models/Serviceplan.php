<?php

namespace frontend\modules\newborn7\models;

use Yii;

/**
 * This is the model class for table "serviceplan".
 *
 * @property string $code
 * @property string $name
 * @property integer $active
 * @property string $lastupdate
 *
 * @property PatientSp[] $patientSps
 * @property Patient[] $hospcodes
 */
class Serviceplan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'serviceplan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['active'], 'integer'],
            [['lastupdate'], 'safe'],
            [['code'], 'string', 'max' => 4],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'active' => 'Active',
            'lastupdate' => 'Lastupdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSps()
    {
        return $this->hasMany(PatientSp::className(), ['sp' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospcodes()
    {
        return $this->hasMany(Patient::className(), ['hospcode' => 'hospcode', 'hn' => 'hn'])->viaTable('patient_sp', ['sp' => 'code']);
    }
}
