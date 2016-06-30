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
 * @property string $tsh_pku
 * @property string $tsh_pku_date
 * @property string $tsh_pku_time
 * @property integer $tsh_pku_result
 * @property string $oae
 * @property string $oae_date
 * @property string $oae_abr
 * @property string $oae_right
 * @property string $oae_left
 * @property string $oae_result
 * @property string $ivh_ult_brain
 * @property string $ivh_date
 * @property integer $ivh_result
 * @property integer $rop
 * @property string $rop_date
 * @property string $rop_result
 * @property string $rop_hosp_appointment
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
            [['date', 'tsh_pku_date', 'tsh_pku_time', 'oae_date', 'oae_abr', 'ivh_date', 'rop_date', 'lastupdate'], 'safe'],
            [['age', 'bp_max', 'bp_min', 'tsh_pku_result', 'ivh_result', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['age_type'], 'string'],
            [['head_size', 'height', 'weight', 'waist'], 'number'],
            [['seq', 'hn', 'inp_id'], 'string', 'max' => 15],
            [['hospcode', 'referin', 'referout'], 'string', 'max' => 5],
            [['clinic', 'pttype'], 'string', 'max' => 6],
            [['result'], 'string', 'max' => 4],
            [['tsh_pku', 'oae', 'rop', 'ivh_ult_brain'], 'string', 'max' => 3],
            [['oae_right', 'oae_left', 'oae_result', 'rop_result', 'rop_hosp_appointment'], 'string', 'max' => 255],
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
            'hospcode' => 'Hospcode',
            'hn' => 'Hn',
            'date' => 'Date',
            'clinic' => 'Clinic',
            'pttype' => 'Pttype',
            'age' => 'Age',
            'age_type' => 'Age Type',
            'result' => 'Result',
            'referin' => 'Referin',
            'referout' => 'Referout',
            'head_size' => 'Head Size',
            'height' => 'Height',
            'weight' => 'Weight',
            'waist' => 'Waist',
            'bp_max' => 'Bp Max',
            'bp_min' => 'Bp Min',
            'inp_id' => 'Inp ID',
            'tsh_pku' => 'Tsh Pku',
            'tsh_pku_date' => 'Tsh Pku Date',
            'tsh_pku_time' => 'Tsh Pku Time',
            'tsh_pku_result' => 'Tsh Pku Result',
            'oae' => 'Oae',
            'oae_date' => 'Oae Date',
            'oae_abr' => 'Oae Abr',
            'oae_right' => 'Oae Right',
            'oae_left' => 'Oae Left',
            'oae_result' => 'Oae Result',
            'ivh_ult_brain' => 'Ivh Ult Brain',
            'ivh_date' => 'Ivh Date',
            'ivh_result' => 'Ivh Result',
            'rop' => 'Rop',
            'rop_date' => 'Rop Date',
            'rop_result' => 'Rop Result',
            'rop_hosp_appointment' => 'Rop Hosp Appointment',
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
        $this->date = $this->date != null ? date('Y-m-d', strtotime(str_replace("/", "-", $this->date))) : null;
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
