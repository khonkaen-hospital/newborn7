<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patient_visit_clinic".
 *
 * @property integer $visit_id
 * @property string $hospcode
 * @property string $hn
 * @property string $seq
 * @property integer $ga
 * @property string $birth_weight
 * @property string $caregivers
 * @property string $current_weight
 * @property string $hc
 * @property string $length
 * @property string $af
 * @property string $clinic_date
 * @property string $milk
 * @property string $milk_other
 * @property string $vaccine
 * @property string $vaccine_other
 * @property string $eye
 * @property string $eye_other
 * @property string $ear
 * @property string $ear_other
 * @property string $ult_brain
 * @property string $ult_brain_result
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class PatientVisitClinic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit_clinic';
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
            [['visit_id'], 'required'],
            [['visit_id', 'ga', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['birth_weight', 'current_weight', 'hc', 'length', 'af'], 'number'],
            [['clinic_date', 'milk', 'vaccine', 'eye', 'ear', 'ult_brain'], 'safe'],
            [['hospcode'], 'string', 'max' => 10],
            [['hn', 'seq'], 'string', 'max' => 15],
            [['caregivers',  'milk_other',  'vaccine_other',  'eye_other',  'ear_other',  'ult_brain_result'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'hospcode' => 'Hospcode',
            'hn' => 'Hn',
            'seq' => 'Seq',
            'ga' => 'Ga',
            'birth_weight' => 'Birth Weight',
            'caregivers' => 'Caregivers',
            'current_weight' => 'Current Weight',
            'hc' => 'Hc',
            'length' => 'Length',
            'af' => 'Af',
            'clinic_date' => 'Clinic Date',
            'milk' => 'Milk',
            'milk_other' => 'Milk Other',
            'vaccine' => 'Vaccine',
            'vaccine_other' => 'Vaccine Other',
            'eye' => 'Eye',
            'eye_other' => 'Eye Other',
            'ear' => 'Ear',
            'ear_other' => 'Ear Other',
            'ult_brain' => 'Ult Brain',
            'ult_brain_result' => 'Ult Brain Result',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->clinic_date = $this->clinic_date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->clinic_date))) : null;
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->clinic_date = $this->clinic_date != null ? date('d/m/Y', strtotime($this->clinic_date)) : null;
//        $this->milk = $this->milk != null ? explode(',', $this->milk): null;
//        $this->vaccine = $this->vaccine != null ? explode(',', $this->vaccine): null;
//        $this->eye = $this->eye != null ? explode(',', $this->eye): null;
//        $this->ear = $this->ear != null ? explode(',', $this->ear): null;
//        $this->ult_brain = $this->ult_brain != null ? explode(',', $this->ult_brain): null;

        return true;
    }

    public function getPatientVisit()
    {
        return $this->hasOne(PatientVisit::className(), ['visit_id' => 'visit_id']);
    }
}
