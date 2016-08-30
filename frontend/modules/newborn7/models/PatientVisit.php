<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
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
class PatientVisit extends ActiveRecord
{

    use ItemsAliasTrait;
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
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'vaccine',
                  ActiveRecord::EVENT_BEFORE_UPDATE => 'vaccine',
              ],
              'value' => function ($event) {
                  return is_array($this->vaccine) ? implode(',',$this->vaccine) : '';
              },
            ],
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'disease',
                  ActiveRecord::EVENT_BEFORE_UPDATE => 'disease',
              ],
              'value' => function ($event) {
                  return is_array($this->disease) ? implode(',',$this->disease) : '';
              },
            ],
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'complication',
                  ActiveRecord::EVENT_BEFORE_UPDATE => 'complication',
              ],
              'value' => function ($event) {
                  return is_array($this->complication) ? implode(',',$this->complication) : '';
              },
            ],
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'procedure_code',
                  ActiveRecord::EVENT_BEFORE_UPDATE => 'procedure_code',
              ],
              'value' => function ($event) {
                  return is_array($this->procedure_code) ? implode(',',$this->procedure_code) : '';
              },
            ],
        ];
    }

    public function fieldToArray(Array $fields){
      foreach ($fields as $key => $field) {
        $this->{$field} = empty($this->{$field}) ? '' : explode(',',$this->{$field});
      }

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'hn'], 'required'],
            [['ivh_result','date', 'tsh_pku_date', 'tsh_pku_time', 'oae_date', 'oae_abr', 'ivh_date', 'rop_date', 'lastupdate','tsh_pku_result'], 'safe'],
            [['age', 'bp_max', 'bp_min', 'created_by', 'updated_by', 'created_at', 'updated_at','patient_id'], 'integer'],
            [['age_type','summary'], 'string'],
            [['head_size', 'height', 'weight', 'waist'], 'number'],
            [['seq', 'hn', 'inp_id'], 'string', 'max' => 15],
            [['hospcode', 'referin', 'referout'], 'string', 'max' => 5],
            [['clinic', 'pttype'], 'string', 'max' => 6],
            [['result'], 'string', 'max' => 4],
            [['tsh_pku', 'oae', 'rop', 'ivh_ult_brain'], 'string', 'max' => 3],
            [['oae_right', 'oae_left', 'oae_result', 'rop_result', 'rop_hosp_appointment'], 'string', 'max' => 255],
            //[['seq', 'hospcode', 'hn'], 'unique', 'targetAttribute' => ['seq', 'hospcode', 'hn'], 'message' => 'The combination of Seq, Hospcode and Hn has already been taken.'],

            [['ga', 'hc', 'length', 'af', 'x', 'foster_name'],'string','max'=>20],
            [['milk', 'milk_milk_powder', 'milk_powder'],'integer'],
            [['vaccine','disease','complication','procedure_code'],'safe'],
            [['vaccine_other'],'string', 'max'=>200]
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
            'date' => 'วันที่',
            'clinic' => 'Clinic',
            'pttype' => 'Pttype',
            'age' => 'อายุ',
            'age_type' => 'Age Type',
            'result' => 'Result',
            'referin' => 'Referin',
            'referout' => 'Referout',
            'head_size' => 'Head Size',
            'height' => 'ส่วนสูง',
            'weight' => 'น้ำหนัก',
            'waist' => 'Waist',
            'bp_max' => 'Bp Max',
            'bp_min' => 'Bp Min',
            'inp_id' => 'Inp ID',
            'tsh_pku' => 'ตรวจ TSH PKU',
            'tsh_pku_date' => 'วันที่เจาะ',
            'tsh_pku_time' => 'เวลาที่เจาะ',
            'tsh_pku_result' => 'ผลตรวจ',
            'oae' => 'ตรวจ OAE',
            'oae_date' => 'วันที่ตรวจ',
            'oae_abr' => 'Oae Abr',
            'oae_right' => 'ผลตรวจข้างขวา',
            'oae_left' => 'ผลตรวจข้างซ้าย',
            'oae_result' => 'ผลตรวจ',
            'ivh_ult_brain' => 'ตรวจ IVH',
            'ivh_date' => 'วันที่ตรวจ',
            'ivh_result' => 'Ivh Result',
            'rop' => 'ตรวจ Rop',
            'rop_date' => 'วันที่ตรวจ',
            'rop_result' => 'การรักษา',
            'rop_hosp_appointment' => 'รพ.ที่นัด',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

            'foster_name'=>'ผู้เลี้ยงดู',
            'milk'=> 'ได้รับนมมารดาอย่างเดียว',
            'milk_milk_powder'=> 'ได้รับนมมารดาและนมผสม',
            'milk_powder'=> 'นมผสมอย่างเดียว',
            'vaccine'=> 'วัคซีนที่ได้รับแล้ว',
            'vaccine_other'=> 'อื่นๆ ระบุ',
            'summary' => 'รายละเอียด'
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
