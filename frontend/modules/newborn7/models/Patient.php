<?php

namespace frontend\modules\newborn7\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Hospitals;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use frontend\modules\newborn7\models\Address;
use frontend\modules\newborn7\models\Changwat;
use frontend\modules\newborn7\models\Amphoe;
use frontend\modules\newborn7\models\Tambon;
use frontend\modules\newborn7\models\Province;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "patient".
 *
 * @property integer $patient_id
 * @property string $hospcode
 * @property string $prov
 * @property string $hn
 * @property string $an
 * @property string $seq
 * @property string $prename
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $cid
 * @property string $dob
 * @property string $sex
 * @property string $dead
 * @property string $mother_cid
 * @property string $mother_name
 * @property integer $mother_age
 * @property string $mother_an
 * @property string $father_cid
 * @property string $father_name
 * @property string $nation
 * @property string $address
 * @property string $moo
 * @property string $soi
 * @property string $road
 * @property string $ban
 * @property string $addcode
 * @property string $zip
 * @property string $tel
 * @property string $mobile
 * @property integer $moi_checked
 * @property integer $type
 * @property integer $serviced
 * @property string $lr_type
 * @property double $high
 * @property integer $weight
 * @property integer $ga
 * @property integer $apgar
 * @property string $remark
 * @property string $inp_id
 * @property string $lastupdate
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PatientSp[] $patientSps
 * @property Serviceplan[] $sps
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

    public function scenarios()
   {
       $scenarios = parent::scenarios();
       $scenarios['newborn'] = ['moi_checked', 'serviced','lr_type','high','weight','ga','apgar','remark'];
       $scenarios['dead'] = ['dead'];
       return $scenarios;
   }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'fname', 'lname','hn','province','amphoe','tumbol'], 'required'],
            [['dob', 'dead', 'lastupdate', 'provinceName'], 'safe'],
            [['sex', 'remark'], 'string'],
            [['mother_age', 'moi_checked', 'serviced', 'weight', 'ga', 'apgar', 'created_by', 'updated_by', 'created_at', 'updated_at','type'], 'integer'],
            [['high'], 'number'],
            [['hospcode', 'prename', 'zip'], 'string', 'max' => 5],
            [['prov'], 'string', 'max' => 2],
            [['hn', 'an', 'seq', 'mother_an','province', 'amphoe', 'tumbol',], 'string', 'max' => 15],
            [['fname', 'mname', 'lname'], 'string', 'max' => 30],
            [['cid', 'mother_cid', 'father_cid', 'address', 'tel', 'mobile'], 'string', 'max' => 20],
            [['mother_name', 'father_name', 'ban'], 'string', 'max' => 50],
            [['nation', 'moo'], 'string', 'max' => 4],
            [['soi', 'road'], 'string', 'max' => 40],
            [['addcode'], 'string', 'max' => 6],
            [['inp_id','lr_type'], 'string', 'max' => 10],
            [['hospcode', 'hn'], 'unique', 'targetAttribute' => ['hospcode', 'hn'], 'message' => 'The combination of Hospcode and Hn has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'hospcode' => 'สถานพยาบาล',
            'prov' => 'จังหวัด',
            'hn' => 'HN',
            'an' => 'AN',
            'seq' => 'VisitNo (SEQ)',
            'prename' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'mname' => 'ชื่อกลาง',
            'lname' => 'นามสกุล',
            'cid' => 'เลขที่บัตรประชาชน',
            'dob' => 'วันเกิด',
            'sex' => 'เพศ',
            'dead' => 'สถานะ',
            'mother_cid' => 'เลขที่บัตรประชาชนมารดา',
            'mother_name' => 'ชื่อมารดา',
            'mother_age' => 'อายุมารดา (ปี)',
            'mother_an' => 'AN มารดา',
            'father_cid' => 'เลขที่บัตรประชาชนบิดา',
            'father_name' => 'ชื่อบิดา',
            'nation' => 'ประเทศ',
            'address' => 'บ้านเลขที่',
            'province' => 'จังหวัด',
            'provinceName' => 'จังหวัด',
            'amphoe' => 'อำเภอ',
            'tumbol' => 'ตำบล',
            'moo' => 'หมู่',
            'soi' => 'ซอย',
            'road' => 'ถนน',
            'ban' => 'หมู่บ้าน',
            'addcode' => 'Addcode',
            'zip' => 'รหัสไปรษณีย์',
            'tel' => 'เบอร์โทรศัพท์บ้าน',
            'mobile' => 'เบอร์โทรศัพท์มือถือ',
            'moi_checked' => 'การคลอด',
            'serviced' => 'Serviced',
            'lr_type' => 'ลักษณะการคลอด',
            'high' => 'ส่วนสูง (ซม.)',
            'weight' => 'น้ำหนัก (กรัม)',
            'ga' => 'GA (wks)',
            'apgar' => 'Apgar (นาทีที่ 5)',
            'remark' => 'หมายเหตุ',
            'inp_id' => 'Inp ID',
            'lastupdate' => 'Lastupdate',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'fullName' => 'ชื่อ-นามสกุล',
            'hospitalName' => 'โรงพยาบาล',
        ];
    }

    public function getFullname(){
      return $this->prename. $this->fname.' '.$this->lname;
    }

    public function getHospital()
    {
        return $this->hasOne(Hospitals::className(), ['off_id' => 'hospcode']);
    }

    public function getHospitalName(){
        return $this->getField('hospital','name');
    }

    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['province_code' => 'prov']);
    }

    public function getProvinceName(){
        $province = Province::find()->where(['province_code' => $this->prov])->one();
        return $province != null ? $province->name : 'ไม่ระบุ';
    }

    private function getField($relationName,$fieldName,$defaultValue=''){
      return isset($this->{$relationName}) ? $this->{$relationName}->{$fieldName} : $defaultValue;
    }

    public function loadInitAddress($id){
      return Address::find()->loadInit($id)->column();
    }

    public function itemAlias($key){
      $items =  [
        'sex'=>[
          1 => 'ชาย',
          2 => 'หญิง'
        ]
      ];
      return ArrayHelper::keyExists($key,$items) ? $items[$key] : [];
    }

    public function getItemSex(){
      return $this->itemAlias('sex');
    }

    public function getItemSexName(){
      $items =  $this->itemAlias('sex');
      return ArrayHelper::keyExists($this->sex,$items) ? $items[$this->sex] : '';
    }

}
