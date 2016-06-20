<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "patient_vaccine".
 *
 * @property integer $id
 * @property string $visit_id
 * @property string $current_weight
 * @property string $hc
 * @property string $length
 * @property string $af
 * @property string $milk
 * @property string $vaccine
 * @property string $vaccine_other
 * @property string $eye
 * @property string $eye_other
 * @property string $ear
 * @property string $ear_other
 * @property string $ult_brain
 * @property integer $ref
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property PatientVisit $ref0
 */
class PatientVaccine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_vaccine';
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
            [['current_weight', 'hc', 'length', 'af'], 'number'],
            [['ref', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['visit_id'], 'string', 'max' => 20],
            [['milk', 'vaccine', 'eye', 'ear', 'ult_brain'], 'string', 'max' => 2],
            [['vaccine_other', 'eye_other', 'ear_other'], 'string', 'max' => 255],
            [['ref'], 'exist', 'skipOnError' => true, 'targetClass' => PatientVisit::className(), 'targetAttribute' => ['ref' => 'id']],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visit_id' => 'Visit ID',
            'current_weight' => 'Current Weight',
            'hc' => 'Hc',
            'length' => 'Length',
            'af' => 'Af',
            'milk' => 'ได้รับนม',
            'vaccine' => 'วัคซีนที่ได้รับแล้ว',
            'vaccine_other' => 'อื่นๆ (ระบุ)',
            'eye' => 'ตรวจตา',
            'eye_other' => 'อื่นๆ (ระบุ)',
            'ear' => 'ตรวจการได้ยิน',
            'ear_other' => 'อื่นๆ (ระบุ)',
            'ult_brain' => 'Ultrasound Brain',
            'ref' => 'Ref',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRef0()
    {
        return $this->hasOne(PatientVisit::className(), ['id' => 'ref']);
    }
}
