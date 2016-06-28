<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patient_sp".
 *
 * @property integer $id
 * @property string $patient_sp_code
 * @property integer $calve_status
 * @property string $weigh
 * @property integer $ga
 * @property string $apgar
 * @property integer $lr_type
 * @property integer $dexa
 * @property integer $dose_brufen
 * @property integer $dose_bt
 * @property integer $htc
 * @property integer $dtx
 * @property integer $resuscltate
 * @property string $date_of_resuscltate
 * @property string $time_of_resuscltate
 * @property integer $ppv
 * @property integer $cpr
 * @property integer $et_tube_status
 * @property integer $uvc
 * @property integer $et_tube
 * @property integer $o2
 * @property integer $pdx
 * @property string $dx
 * @property string $dx_other
 * @property string $comp
 * @property string $comp_other
 * @property string $proc
 * @property string $proc_other
 * @property string $hospcode
 * @property integer $patient_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Patient $hospcode0
 * @property Patient $patient
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

            'dx' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dx'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dx'],
                ],
                'value' => function ($event) {
                    return $this->dx != null ? implode(',', $this->dx) : null;
                }
            ],

            'comp' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['comp'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['comp'],
                ],
                'value' => function ($event) {
                    return $this->comp != null ? implode(',', $this->comp) : null;
                }
            ],

            'proc' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['proc'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['proc'],
                ],
                'value' => function ($event) {
                    return $this->proc != null ? implode(',', $this->proc) : null;
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
            [['calve_status', 'ga', 'lr_type', 'dexa', 'dose_brufen', 'dose_bt', 'htc', 'dtx', 'resuscltate', 'ppv', 'cpr', 'et_tube_status', 'uvc', 'et_tube', 'o2', 'pdx', 'patient_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['weigh'], 'number'],
            [['apgar', 'date_of_resuscltate', 'time_of_resuscltate', 'dx', 'comp', 'proc'], 'safe'],
            [['patient_sp_code', 'hospcode'], 'string', 'max' => 20],
            [['dx_other', 'comp_other', 'proc_other'], 'string', 'max' => 255],
            [['hospcode'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['hospcode' => 'hospcode']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_sp_code' => 'Patient Sp Code',
            'calve_status' => 'สถานที่คอลด',
            'weigh' => 'น้ำหนัก',
            'ga' => 'Ga',
            'apgar' => 'Apgar',
            'lr_type' => 'ลักษณะการคลอด',
            'dexa' => 'Dexa (มารดา)',
            'dose_brufen' => 'Dose Brufen',
            'dose_bt' => 'Dose Bt',
            'htc' => 'Htc',
            'dtx' => 'Dtx',
            'resuscltate' => 'Resuscltate (Yes/No)',
            'date_of_resuscltate' => 'Date Of Resuscltate',
            'time_of_resuscltate' => 'Time Of Resuscltate',
            'ppv' => 'PPV',
            'cpr' => 'CPR (Yes/No)',
            'et_tube_status' => 'ET-Tube (Yes/No)',
            'uvc' => 'UVC (Yes/No)',
            'et_tube' => 'จำนวนที่ใส ET-Tube',
            'o2' => 'จำนวนที่ได้รับ O2',
            'pdx' => 'PDX (โรคหลัก)',
            'dx' => 'Disease',
            'dx_other' => 'Disease อื่นๆ',
            'comp' => 'Complication',
            'comp_other' => 'Complication อื่นๆ',
            'proc' => 'Procedure',
            'proc_other' => 'Procedure อื่นๆ',
            'hospcode' => 'Hospcode',
            'patient_id' => 'Patient ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_of_resuscltate = date('Y-m-d', strtotime(str_replace("/", "-", $this->date_of_resuscltate)));
            return true;
        } else {
            return false;
        }
    }


    public function afterFind()
    {
        parent::afterFind();
        $this->dx = $this->dx != null ? explode(',', $this->dx): null;
        $this->comp = $this->comp != null ? explode(',', $this->comp): null;
        $this->proc = $this->proc != null ? explode(',', $this->proc): null;

        $this->date_of_resuscltate = date('d/m/Y', strtotime($this->date_of_resuscltate));
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientByHospcode()
    {
        return $this->hasOne(Patient::className(), ['hospcode' => 'hospcode']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientById()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }
}
