<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

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
    public $dev1;
    public $dev2;
    public $dev3;
    public $dev4;
    public $dev5;
    public $dev6;
    public $dev7;

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

            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['develop', 'dev1', 'dev2', 'dev3', 'dev4', 'dev5', 'dev6', 'dev7'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['develop', 'dev1', 'dev2', 'dev3', 'dev4', 'dev5', 'dev6', 'dev7'],
                ],
                'value' => function ($event) {

                    $items = [];
                    $result = null;

                    if (!empty($this->dev1)) {
                        array_push($items, $this->dev1);
                    }
                    if (!empty($this->dev2)) {
                        array_push($items, $this->dev2);
                    }
                    if (!empty($this->dev3)) {
                        array_push($items, $this->dev3);
                    }
                    if (!empty($this->dev4)) {
                        array_push($items, $this->dev4);
                    }
                    if (!empty($this->dev5)) {
                        array_push($items, $this->dev5);
                    }
                    if (!empty($this->dev6)) {
                        array_push($items, $this->dev6);
                    }
                    if (!empty($this->dev7)) {
                        array_push($items, $this->dev7);
                    }
                    foreach ($items as $item) {

                        $result .= implode(',', $item).',';
                    }
                    return trim($result, ",");
                },
            ],

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
            [['ref'], 'exist', 'skipOnError' => true, 'targetClass' => PatientVisit::className(), 'targetAttribute' => ['ref' => 'id']],
            [['develop', 'dev1', 'dev2', 'dev3', 'dev4', 'dev5', 'dev6', 'dev7'], 'safe'],
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
            'develop' => 'พัฒนาการ',
            'age' => 'อายุ',
            'ref' => 'ช่วงอายุ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function getDevelopName()
    {

        $develops = ArrayHelper::map(PatientDevelopment::find()->all(), 'id', 'item_name');
        $developsSelected = explode(',', $this->develop);
        $developsSelectedName = [];
        foreach ($develops as $key => $developName) {
            foreach ($developsSelected as $developKey) {
                if ($key === (int)$developKey) {
                    $developsSelectedName[] = $developName;
                }
            }
        }
        return implode(', ', $developsSelectedName);
    }

    public function developToArray()
    {
        return $this->develop = explode(',', $this->develop);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientVisit()
    {
        return $this->hasOne(PatientVisit::className(), ['id' => 'ref']);
    }
}
