<?php

namespace frontend\modules\newborn7\models;

use Yii;

/**
 * This is the model class for table "patient_visit_develop".
 *
 * @property integer $visit_id
 * @property string $age_group
 * @property string $develop_no
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class PatientVisitDevelop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_visit_develop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id', 'age_group', 'develop_no'], 'required'],
            [['visit_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['lastupdate'], 'safe'],
            [['age_group'], 'string', 'max' => 3],
            [['develop_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'age_group' => 'Age Group',
            'develop_no' => 'Develop No',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
