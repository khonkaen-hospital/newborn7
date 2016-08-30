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
 * @property double $height
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
    use ItemsAliasTrait;
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
       $scenarios['default'] = [
         'hospcode', 'fname', 'lname','hn','province','amphoe','tumbol',
         'dob', 'dead', 'lastupdate', 'provinceName',
         'sex', 'remark',
         'moi_checked', 'serviced', 'weight', 'ga', 'apgar', 'created_by', 'updated_by', 'created_at', 'updated_at',
         'height','hospcode', 'prename', 'zip','prov',
         'hn', 'an', 'seq', 'mother_an','moo','soi','road','ban','province', 'amphoe', 'tumbol',
         'fname', 'mname', 'lname',
         'cid', 'address', 'tel', 'mobile'
       ];
       $scenarios['parent-history'] = [
         'mother_cid',
         'mother_title',
         'mother_name',
         'mother_surname',
         'mother_age',
         'mother_an',
         'mother_hn',
         'mother_vdrl',
         'mother_hbsag',
         'mother_anti_hiv',
         'mother_g',
         'mother_p',
         'mother_no_of_anc',
         'mother_congenital_disease',
         'mother_congenital_disease_name',
         'mother_drug',
         'mother_fever',
         'mother_water_break',
         'mother_day_of_water_break',
         'mother_antibiotic',
         'mother_antibiotic_name',
         'mother_day_of_antibiotic',
         'mother_bloody_show',
         'mother_problem',
         'mother_problem_desc',
         'mother_drug_before_born',
         'mother_drug_name_before_born',
         'mother_amniotic_fluid_type',
         'mother_cid', 'father_cid', 'father_name'
       ];
       $scenarios['newborn'] = [
         'type',
         'type_refer_from',
         'ward_admit',
         'age_of_admit',
         'ga',
         'weight',
         'height',
         'lr_type',
         'apgar',
         'resuscitate',
         'cpr',
         'date_of_resuscitate',
         'ppv',
         'et_tube',
         'uvc',
         'day_of_et_tube',
         'day_of_o2',
         'admit_datetime',
         'discharge_datetime',
         'status_discharge',
         'age_of_discharge',
         'remark',
         'moi_checked',
         'serviced',
         'lr_type',
         'height',
         'weight',
         'ga',
         'apgar',
         'remark',
        'position_et_tube'];
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
            [['height','moi_checked', 'serviced', 'weight', 'ga', 'apgar', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            //[[''], 'number'],
            [['hospcode', 'prename', 'zip'], 'string', 'max' => 5],
            [['prov'], 'string', 'max' => 2],
            [['hn', 'an', 'seq', 'mother_an','province', 'amphoe', 'tumbol'], 'string', 'max' => 15],
            [['fname', 'mname', 'lname'], 'string', 'max' => 30],
            [['cid', 'father_cid', 'address', 'tel', 'mobile'], 'string', 'max' => 20],


            [['nation', 'moo'], 'string', 'max' => 4],
            [['soi', 'road'], 'string', 'max' => 40],
            [['addcode'], 'string', 'max' => 6],
            [['inp_id','lr_type'], 'string', 'max' => 10],
            [['hospcode', 'hn'], 'unique', 'targetAttribute' => ['hospcode', 'hn'], 'message' => 'The combination of Hospcode and Hn has already been taken.'],


            [['type','type_refer_from','status_discharge','age_of_admit','resuscitate','cpr','et_tube','position_et_tube','uvc','day_of_et_tube','day_of_o2'],'integer'],
            [['ward_admit'], 'string', 'max' => 255],
            [['age_of_discharge'], 'string', 'max' => 100],
            [['brufen','bt','hct','dtx','ppv'], 'string', 'max' => 50],
            [['admit_datetime','date_of_resuscitate','refer_date','refer_hospital','remark'], 'safe'],


            [['mother_age','mother_no_of_anc','mother_vdrl','mother_hbsag','mother_anti_hiv','mother_congenital_disease','mother_fever','mother_water_break','mother_day_of_water_break','mother_day_of_antibiotic','mother_bloody_show','mother_problem','mother_drug_before_born','mother_amniotic_fluid_type'], 'integer'],
            [['mother_cid','mother_g','mother_p'], 'string', 'max' => 20],
            [['mother_hn','mother_an'], 'string', 'max' => 30],
            [['mother_title'], 'string', 'max' => 100],
            [['mother_antibiotic_name','mother_drug_name_before_born'], 'string', 'max' => 150],
            [['father_name','mother_name','mother_surname','mother_antibiotic'], 'string', 'max' => 200],
            [['mother_congenital_disease_name','mother_problem_desc'], 'string', 'max' => 255],
            [['mother_drug'],'safe']



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
            'uvc' => 'UVC',
            'father_cid' => 'เลขที่บัตรประชาชนบิดา',
            'father_name' => 'ชื่อ-นามสกุลบิดา',
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
            'height' => 'Height (cm)',
            'weight' => 'Birth Weight (gms)',
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
            'admit_date' => 'วันที่ Admit',
            'admit_time' => 'เวลาที่ Admit',
            'type' => 'คลอดที่',
            'type_refer_from' => 'รับ refer จาก',
            'age_of_admit' => 'อายุ ณ วัน admit',
            'age_of_discharge' => 'อายุ ณ วัน discharge',
            'cpr' => 'CPR',
            'ppv' => 'PPV (cicle)',
            'et_tube'=>'ET-Tube',
            'day_of_et_tube' => 'จำนวนวันที่ใส่ ET-Tube',
            'day_of_o2' => 'จำนวนวันที่รับ O2',
            'position_et_tube' => 'ตำแหน่งที่ใส่ ET-Tube',
            'admit_datetime'=>'วันที่ Admit',
            'ward_admit'=>'Ward Admit',
            'mother_cid' => 'เลขที่บัตรประชาชน',
            'mother_title' => 'คำนำหน้า',
            'mother_name' => 'ชื่อ',
            'mother_surname' => 'นามสกุล',
            'mother_age' => 'อายุ (ปี)',
            'mother_an' => 'AN',
            'mother_hn' => 'HN',
            'mother_vdrl'=>'VDRL',
            'mother_hbsag'=>'HBsAg',
            'mother_anti_hiv'=>'Anti HIV',
            'mother_g'=>'G',
            'mother_p'=>'P',
            'mother_no_of_anc'=>'No. of ANC',
            'mother_congenital_disease' => 'มีโรคประจำตัว',
            'mother_congenital_disease_name' => 'ถ้ามีระบุ',
            'mother_drug' => 'ยาที่กินประจำ',
            'mother_fever'=>'มีไข้',
            'mother_water_break'=>'น้ำเดิน',
            'mother_day_of_water_break'=>'จำนวนชั่วโมง',
            'mother_antibiotic'=>'ได้รับยาปฏิชีวนะ',
            'mother_antibiotic_name'=>'ชื่อยาปฏิชีวนะ',
            'mother_day_of_antibiotic'=>'จำนวนวัน',
            'mother_bloody_show'=>'มีเลือดออกทางช่องคลอด',
            'mother_problem'=>'ปัญหาอื่นๆ',
            'mother_problem_desc'=>'ถ้ามีระบุ',
            'mother_drug_before_born'=>'ได้รับยาก่อนคลอด',
            'mother_drug_before_born_item'=>'ชื่อยาที่ได้รับ',
            'mother_drug_name_before_born'=>'ถ้าได้รับระบุ',
            'mother_drug_before_born_amount'=>'จำนวน (Dose)',
            'mother_amniotic_fluid_type'=>'ลักษณะน้ำคร่ำ'

        ];
    }

    public function getFullname(){
      return $this->getItemLabel('prename'). $this->fname.' '.$this->lname;
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
        ],
        'prename'=>[
          1 => 'ด.ช.',
          2 => 'ด.ญ.'
        ]
      ];
      return ArrayHelper::keyExists($key,$items) ? $items[$key] : [];
    }

    public function getItemLabel($field){
      $items =  $this->itemAlias($field);
      return ArrayHelper::keyExists($this->{$field},$items) ? $items[$this->{$field}] : '';
    }

    public function getItemSex(){
      return $this->itemAlias('sex');
    }



    public function getItemSexName(){
      $items =  $this->itemAlias('sex');
      return ArrayHelper::keyExists($this->sex,$items) ? $items[$this->sex] : '';
    }

}
