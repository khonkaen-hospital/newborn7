<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "patient_sp".
 *
 * @property string $hospcode
 * @property string $sp
 * @property string $hn
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Patient $hospcode0
 * @property Serviceplan $sp0
 */
class PatientSp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_sp';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'sp', 'hn'], 'required'],
            [['lastupdate'], 'safe'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['hospcode'], 'string', 'max' => 5],
            [['sp'], 'string', 'max' => 4],
            [['hn'], 'string', 'max' => 20],
            [['hospcode', 'hn'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['hospcode' => 'hospcode', 'hn' => 'hn']],
            [['sp'], 'exist', 'skipOnError' => true, 'targetClass' => Serviceplan::className(), 'targetAttribute' => ['sp' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'sp' => 'Sp',
            'hn' => 'Hn',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospcode0()
    {
        return $this->hasOne(Patient::className(), ['hospcode' => 'hospcode', 'hn' => 'hn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSp0()
    {
        return $this->hasOne(Serviceplan::className(), ['code' => 'sp']);
    }
}
