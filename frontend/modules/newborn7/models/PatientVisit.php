<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patient_visit".
 *
 * @property integer $visit_id
 * @property string $seq
 * @property string $hospcode
 * @property string $hn
 * @property string $date
 * @property string $clinic
 * @property string $pttype
 * @property integer $age
 * @property string $age_type
 * @property string $result
 * @property string $referin
 * @property string $referout
 * @property double $head_size
 * @property double $height
 * @property double $weight
 * @property double $waist
 * @property integer $bp_max
 * @property integer $bp_min
 * @property string $inp_id
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PatientVisitDiag $patientVisitDiag
 * @property PatientVisitProcedure $patientVisitProcedure
 */
class PatientVisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit';
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
            [['seq', 'hospcode', 'hn'], 'required'],
            [['date', 'lastupdate'], 'safe'],
            [['age', 'bp_max', 'bp_min', 'tsh_pku_result', 'ivh_result', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['tsh_pku_date', 'tsh_pku_time', 'oae_date', 'oae_abr', 'ivh_date', 'rop_date'], 'safe'],
            [['tsh_pku', 'oae', 'ivh_ult_brain', 'rop'], 'string', 'max' => 3],
            [['oae_right', 'oae_left', 'oae_result', 'rop_result', 'rop_hosp_appointment'], 'string', 'max' => 255],
            [['age_type'], 'string'],
            [['head_size', 'height', 'weight', 'waist'], 'number'],
            [['seq', 'hn', 'inp_id'], 'string', 'max' => 15],
            [['hospcode', 'referin', 'referout'], 'string', 'max' => 5],
            [['clinic', 'pttype'], 'string', 'max' => 6],
            [['result'], 'string', 'max' => 4],
            [['seq', 'hospcode', 'hn'], 'unique', 'targetAttribute' => ['seq', 'hospcode', 'hn'], 'message' => 'The combination of Seq, Hospcode and Hn has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'seq' => 'Seq',
            'hospcode' => 'สถานพยาบาล',
            'hn' => 'HN',
            'date' => 'วันที่',
            'clinic' => 'คลินิก',
            'pttype' => 'สิทธิของผู้ป่วย',
            'age' => 'อายุ',
            'age_type' => 'ประเภทอายุ',
            'result' => 'ผล',
            'referin' => 'รับจากโรงพยาบาล',
            'referout' => 'ส่งต่อโรงพยาบาล',
            'head_size' => 'ขนาดศรีษะ',
            'height' => 'ส่วนสูง',
            'weight' => 'น้ำหนัก (กรัม)',
            'waist' => 'ขนาดเอว',
            'bp_max' => 'Bp Max',
            'bp_min' => 'Bp Min',
            'inp_id' => 'Inp ID',

            'tsh_pku' => 'TSH PKU (Yes/No)',
            'tsh_pku_date' => 'วันที่เจาะ (วัน/เดือน/ปี)',
            'tsh_pku_time' => 'เวลา',
            'tsh_pku_result' => 'ผล TSH PKU',
            'oae' => 'OAE (Yes/No)',
            'oae_date' => 'วันที่ตรวจ (วัน/เดือน/ปี)',
            'oae_right' => 'F/U ผลตรวจข้างขวา (Pass/Refer)',
            'oae_left' => 'ผลตรวจข้างซ้าย (Pass/Refer)',
            'oae_result' => 'ผลสรุป',
            'oae_abr' => 'นัด ABR (วัน/เดือน/ปี)',
            'ivh_ult_brain' => 'Ultrasound Brain (Yes/No)',
            'ivh_date' => 'วันที่ตรวจ (วัน/เดือน/ปี)',
            'ivh_result' => 'ผลตรวจ F/U ระดับ IVH',
            'rop' => 'ROP (Yes/No)',
            'rop_date' => 'วันที่ตรวจ (วัน/เดือน/ปี)',
            'rop_result' => 'ผลตรวจ F/U ระดับ ROP',
            'rop_hosp_appointment' => 'โรงพยาบาลที่นัด',

            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date = $this->date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->date))) : null;
            $this->tsh_pku_date = $this->tsh_pku_date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->tsh_pku_date))) : null;
            $this->oae_date = $this->oae_date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->oae_date))) : null;
            $this->ivh_date = $this->ivh_date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->ivh_date))) : null;
            $this->oae_abr = $this->oae_abr != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->oae_abr))) : null;
            $this->rop_date = $this->rop_date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->rop_date))) : null;
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->date = $this->date != null ? date('d/m/Y', strtotime($this->date)) : null;
        $this->tsh_pku_date = $this->tsh_pku_date != null ? date('d/m/Y', strtotime($this->tsh_pku_date)) : null;
        $this->oae_date = $this->oae_date != null ? date('d/m/Y', strtotime($this->oae_date)) : null;
        $this->ivh_date = $this->ivh_date != null ? date('d/m/Y', strtotime($this->ivh_date)) : null;
        $this->oae_abr = $this->oae_abr != null ? date('d/m/Y', strtotime($this->oae_abr)) : null;
        $this->rop_date = $this->rop_date != null ? date('d/m/Y', strtotime($this->rop_date)) : null;
        return true;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientVisitDiag()
    {
        return $this->hasOne(PatientVisitDiag::className(), ['visit_id' => 'visit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientVisitProcedure()
    {
        return $this->hasOne(PatientVisitProcedure::className(), ['visit_id' => 'visit_id']);
    }
}
