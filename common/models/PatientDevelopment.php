<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "patient_development".
 *
 * @property integer $id
 * @property string $visit_id
 * @property integer $age
 * @property integer $ref
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property PatientVisit $ref0
 */
class PatientDevelopment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_development';
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
            [['age', 'ref', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['visit_id'], 'string', 'max' => 20],
            [['develop'], 'string', 'max' => 255],
            [['ref'], 'exist', 'skipOnError' => true, 'targetClass' => PatientVisit::className(), 'targetAttribute' => ['ref' => 'id']],
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
            'develop' => 'Develop',
            'age' => 'Age',
            'ref' => 'Ref',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRef0()
    {
        return $this->hasOne(PatientVisit::className(), ['id' => 'ref']);
    }
}
