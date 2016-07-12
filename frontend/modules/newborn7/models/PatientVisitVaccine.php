<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patient_visit_vaccine".
 *
 * @property integer $visit_id
 * @property string $vaccine_no
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class PatientVisitVaccine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit_vaccine';
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
            [['visit_id'], 'required'],
            [['visit_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['lastupdate' , 'vaccine_no'], 'safe'],
//            [['vaccine_no'], 'string', 'max' => 10],
            [['vaccine_other'], 'string', 'max' => 255],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'vaccine_no' => 'วัคซีนที่ได้รับแล้ว',
            'vaccine_other' => 'อื่นๆ',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
