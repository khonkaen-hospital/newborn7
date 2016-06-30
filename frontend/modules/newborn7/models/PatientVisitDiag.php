<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patient_visit_diag".
 *
 * @property integer $visit_id
 * @property string $diagcode
 * @property integer $typegiag
 * @property string $typeicd
 * @property string $diag
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PatientVisit $visit
 */
class PatientVisitDiag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit_diag';
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
            [['visit_id', 'typegiag', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['typeicd'], 'string'],
            [['lastupdate'], 'safe'],
            [['diagcode'], 'string', 'max' => 7],
            [['diag'], 'string', 'max' => 200],
            [['visit_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientVisit::className(), 'targetAttribute' => ['visit_id' => 'visit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'diagcode' => 'Diagcode',
            'typegiag' => 'Typegiag',
            'typeicd' => 'Typeicd',
            'diag' => 'Diag',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisit()
    {
        return $this->hasOne(PatientVisit::className(), ['visit_id' => 'visit_id']);
    }
}
