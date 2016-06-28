<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "patient_visit".
 *
 * @property integer $id
 * @property string $visit_id
 * @property string $hospcode_seq
 * @property string $hospcode_hn
 * @property integer $visit_date
 * @property string $tsh_pku
 * @property string $tsh_pku_date
 * @property integer $tsh_pku_result
 * @property string $oae
 * @property string $oae_date
 * @property string $oae_right
 * @property string $oae_left
 * @property string $oae_result
 * @property integer $oae_abr
 * @property string $ivh_ult_brain
 * @property string $ivh_date
 * @property integer $ivh_result
 * @property string $rop
 * @property string $rop_date
 * @property string $rop_result
 * @property string $rop_hosp_appointment
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $update_by
 * @property integer $appointment_no
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
            [['visit_date', 'tsh_pku_result', 'ivh_result', 'created_at', 'updated_at', 'created_by', 'updated_by', 'appointment_no', 'patient_id'], 'integer'],
            [['tsh_pku_date', 'tsh_pku_time', 'oae_date', 'oae_abr', 'ivh_date', 'rop_date'], 'safe'],
            [['visit_id', 'hospcode_seq', 'hospcode_hn'], 'string', 'max' => 20],
            [['tsh_pku', 'oae', 'ivh_ult_brain', 'rop'], 'string', 'max' => 3],
            [['oae_right', 'oae_left', 'oae_result', 'rop_result', 'rop_hosp_appointment'], 'string', 'max' => 255],
            [['hospcode_seq'], 'unique'],
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
            'hospcode_seq' => 'Hospcode Seq',
            'hospcode_hn' => 'Hospcode Hn',
            'visit_date' => 'Visit Date',
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Update By',
            'appointment_no' => 'Appointment No',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
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
        $this->tsh_pku_date = $this->tsh_pku_date != null ? date('d/m/Y', strtotime($this->tsh_pku_date)) : null;
        $this->oae_date = $this->tsh_pku_date != null ? date('d/m/Y', strtotime($this->oae_date)) : null;
        $this->ivh_date = $this->tsh_pku_date != null ? date('d/m/Y', strtotime($this->ivh_date)) : null;
        $this->oae_abr = $this->tsh_pku_date != null ? date('d/m/Y', strtotime($this->oae_abr)) : null;
        $this->rop_date = $this->tsh_pku_date != null ? date('d/m/Y', strtotime($this->rop_date)) : null;
        return true;
    }
}
