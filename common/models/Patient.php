<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $hospcode
 * @property string $hn
 * @property string $an
 * @property integer $id_card
 * @property string $first_name
 * @property string $last_name
 * @property integer $sex
 * @property string $birth_date
 * @property string $at_birth
 * @property string $ward_admit
 * @property string $refer_receive
 * @property string $refer_to
 * @property integer $dead
 * @property string $exp
 * @property integer $exp_age
 * @property integer $los
 * @property string $address
 * @property integer $province
 * @property integer $amphoe
 * @property integer $district
 * @property integer $postcode
 * @property integer $phone
 * @property integer $mobile
 * @property integer $id_card_mum
 * @property string $first_name_mum
 * @property string $last_name_mum
 * @property string $hn_mum
 * @property string $an_mum
 * @property string $age_mum
 * @property integer $id_card_papa
 * @property string $first_name_papa
 * @property string $last_name_papa
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property PatientSp[] $patientSps
 * @property PatientSp[] $patientSps0
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
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
            [['sex', 'dead', 'exp_age', 'los', 'province', 'amphoe', 'district', 'postcode', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['birth_date', 'at_birth', 'exp'], 'safe'],
            [['address'], 'string'],
            [['hospcode', 'hn', 'an', 'hn_mum', 'an_mum', 'age_mum', 'id_card_mum', 'id_card_papa', 'id_card', 'phone', 'mobile'], 'string', 'max' => 20],
            [['first_name', 'last_name', 'first_name_mum', 'last_name_mum', 'first_name_papa', 'last_name_papa'], 'string', 'max' => 100],
            [['ward_admit', 'refer_receive', 'refer_to'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospcode' => 'สถานพยาบาล',
            'hn' => 'HN',
            'an' => 'AN',
            'id_card' => 'เลขที่บัตรประชาชน',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'sex' => 'เพศ',
            'birth_date' => 'วันเกิด',
            'at_birth' => 'เวลา เกิด',
            'ward_admit' => 'วอร์ด Admit',
            'refer_receive' => 'รับ Refer จาก',
            'refer_to' => 'ส่งต่อ',
            'dead' => 'ตาย',
            'exp' => 'วันที่จำหน่าย',
            'exp_age' => 'อายุที่จำหยน่าย',
            'los' => 'Los',
            'address' => 'ที่อยู่',
            'province' => 'จังหวัด',
            'amphoe' => 'อำเภอ',
            'district' => 'ตำบล',
            'postcode' => 'รหัสไปรษณี',
            'phone' => 'เบอร์โทรบ้าน',
            'mobile' => 'เบอร์มือถือ',
            'id_card_mum' => 'เลขที่บัตรประชาชน มารดา',
            'first_name_mum' => 'ชื่อมารดา',
            'last_name_mum' => 'นามสกุลมารดา',
            'hn_mum' => 'HN มารดา',
            'an_mum' => 'AN มารดา',
            'age_mum' => 'อายุ (ปี)',
            'id_card_papa' => 'เลขที่บัตรประชาชนบิดา',
            'first_name_papa' => 'ชื่อบิดา',
            'last_name_papa' => 'นามสกุลบิดา',

            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->birth_date = date('Y-m-d', strtotime(str_replace("/", "-", $this->birth_date)));
            $this->exp = date('Y-m-d', strtotime(str_replace("/", "-", $this->exp)));
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->birth_date = date('d/m/Y', strtotime($this->birth_date));
        $this->exp = date('d/m/Y', strtotime($this->exp));
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSpsByHospcode()
    {
        return $this->hasOne(PatientSp::className(), ['hospcode' => 'hospcode']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSpsById()
    {
        return $this->hasOne(PatientSp::className(), ['patient_id' => 'id']);
    }
}
