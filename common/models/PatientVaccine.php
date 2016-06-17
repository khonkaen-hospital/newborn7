<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "patient_vaccine".
 *
 * @property integer $id
 * @property string $current_weight
 * @property string $hc
 * @property string $length
 * @property string $af
 * @property string $milk
 * @property string $vaccine
 * @property string $vaccine_other
 * @property string $eye
 * @property string $eye_other
 * @property string $ear
 * @property string $ear_other
 * @property string $ult_brain
 * @property string $ref
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class PatientVaccine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_vaccine';
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
            [['current_weight', 'hc', 'length', 'af'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['milk', 'vaccine', 'eye', 'ear', 'ult_brain'], 'string', 'max' => 2],
            [['vaccine_other', 'eye_other', 'ear_other', 'ref'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'current_weight' => 'น้ำหนักปัจจุบัน (กรัม)',
            'hc' => 'HC (cm)',
            'length' => 'Length (cm)',
            'af' => 'AF (cm)',
            'milk' => 'ได้รับนม',
            'vaccine' => 'วัคซีนที่ได้รับ',
            'vaccine_other' => 'อื่นๆ (ระบุ)',
            'eye' => 'ตรวจตา',
            'eye_other' => 'อื่นๆ (ระบุ)',
            'ear' => 'ตรวจการได้ยิน',
            'ear_other' => 'อื่นๆ (ระบุ)',
            'ult_brain' => 'Ultrasound Brain',
            'ref' => 'Ref',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function itemsAlias($key)
    {
        $items = [
            'milk' => [
                '1' => 'นมมารดาอย่างเดียว',
                '2' => 'นมมารดา + นมผสม',
                '3' => 'นมผสมอย่างเดียว',
                '99' => 'อื่นๆ'
            ],

            'vaccine' => [
                '1' => 'BCG',
                '2' => 'HBV',
                '3' => 'DTP-HBV-OPV1',
                '4' => 'DTP-HBV-OPV2',
                '5' => 'DTP-HBV-OPV3',
                '6' => 'MMR',
                '7' => 'JE1',
                '8' => 'JE2',
                '9' => 'JE3',
                '99' => 'อื่นๆ',
            ],

            'eye' => [
                '1' => 'ตรวจแล้ว',
                '2' => 'ไม่ได้ตรวจ',
                '3' => 'ผล NO ROP',
                '4' => 'ผล ROP Stage',
                '99' => 'อื่นๆ'
            ],

            'ear' => [
                '1' => 'ตรวจแล้ว',
                '2' => 'ไม่ได้ตรวจ',
                '3' => 'ผลปกติ',
                '4' => 'ผลไม่ปกติ',
                '99' => 'อื่นๆ'
            ],

            'ult' => [
                '1' => 'ตรวจแล้ว',
                '2' => 'ไม่ได้ตรวจ',
                '3' => 'ผลปกติ',
                '4' => 'ผลไม่ปกติ',
                '99' => 'อื่นๆ'
            ]
        ];

        return ArrayHelper::getValue($items, $key, []);
    }

    public function getItemMilk()
    {
        return self::itemsAlias('milk');
    }

    public function getItemVaccine()
    {
        return self::itemsAlias('vaccine');
    }

    public function getItemEye()
    {
        return self::itemsAlias('eye');
    }

    public function getItemEar()
    {
        return self::itemsAlias('ear');
    }

    public function getItemUlt()
    {
        return self::itemsAlias('ult');
    }
}
