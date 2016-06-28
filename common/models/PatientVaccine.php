<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

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

            'milk' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['milk'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['milk'],
                ],
                'value' => function ($event) {
                    return $this->milk != null ? implode(',', $this->milk) : null;
                }
            ],

            'vaccine' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['vaccine'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['vaccine'],
                ],
                'value' => function ($event) {
                    return $this->vaccine != null ? implode(',', $this->vaccine) : null;
                }
            ],

            'eye' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['eye'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['eye'],
                ],
                'value' => function ($event) {
                    return $this->eye != null ? implode(',', $this->eye) : null;
                }
            ],

            'ear' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['ear'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['ear'],
                ],
                'value' => function ($event) {
                    return $this->ear != null ? implode(',', $this->ear) : null;
                }
            ],

            'ult_brain' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['ult_brain'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['ult_brain'],
                ],
                'value' => function ($event) {
                    return $this->ult_brain != null ? implode(',', $this->ult_brain) : null;
                }
            ],
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
            [['vaccine_other', 'eye_other', 'ear_other'], 'string', 'max' => 255],
            [['ref'], 'exist', 'skipOnError' => true, 'targetClass' => PatientVisit::className(), 'targetAttribute' => ['ref' => 'id']],
            [['milk', 'vaccine', 'eye', 'ear', 'ult_brain'], 'safe'],
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


    public function afterFind()
    {
        parent::afterFind();
        $this->milk = $this->milk != null ? explode(',', $this->milk): null;
        $this->vaccine = $this->vaccine != null ? explode(',', $this->vaccine): null;
        $this->eye = $this->eye != null ? explode(',', $this->eye): null;
        $this->ear = $this->ear != null ? explode(',', $this->ear): null;
        $this->ult_brain = $this->ult_brain != null ? explode(',', $this->ult_brain): null;

        return true;
    }


//    public function milkToArray()
//    {
//        return $this->milk = $this->milk != null ? explode(',', $this->milk) : null;
//    }
//
//    public function vaccineToArray()
//    {
//        return $this->vaccine = $this->vaccine != null ? explode(',', $this->vaccine) : null;
//    }
//
//    public function eyeToArray()
//    {
//        return $this->eye = $this->eye != null ? explode(',', $this->eye) : null;
//    }
//
//    public function earToArray()
//    {
//        return $this->ear = $this->ear != null ? explode(',', $this->ear) : null;
//    }
//
//    public function ult_brainToArray()
//    {
//        return $this->ult_brain = $this->ult_brain != null ? explode(',', $this->ult_brain) : null;
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRef0()
    {
        return $this->hasOne(PatientVisit::className(), ['id' => 'ref']);
    }
}
