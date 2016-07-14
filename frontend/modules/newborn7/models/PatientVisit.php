<?php

namespace frontend\modules\newborn7\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seq', 'hospcode', 'hn'], 'required'],
            [['date', 'lastupdate'], 'safe'],
            [['age', 'bp_max', 'bp_min'], 'integer'],
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
            'lastupdate' => 'Lastupdate',
        ];
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

    /**
     * @inheritdoc
     * @return PatientVisitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatientVisitQuery(get_called_class());
    }
}
