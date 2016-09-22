<?php

namespace frontend\modules\nb\models;

use Yii;
use common\models\Hospitals;
use yii\behaviors\AttributeBehavior;
use common\behaviors\AttributeValueBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "person".
 *
 * @property string $hospcode
 * @property string $cid
 * @property string $pid
 * @property string $hid
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $hn
 * @property string $sex
 * @property string $birth
 * @property string $mstatus
 * @property string $occupation_old
 * @property string $occupation_new
 * @property string $race
 * @property string $nation
 * @property string $religion
 * @property string $education
 * @property string $fstatus
 * @property string $father
 * @property string $mother
 * @property string $couple
 * @property string $vstatus
 * @property string $movein
 * @property string $discharge
 * @property string $ddischarge
 * @property string $abogroup
 * @property string $rhgroup
 * @property string $labor
 * @property string $passport
 * @property string $typearea
 * @property string $d_update
 * @property string $mother_name
 * @property string $father_name
 */
class Person extends ActiveRecord
{
    use \frontend\modules\nb\traits\ItemsAliasTrait;

    public $adBirth;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => ['birth', 'register_date','admit_datetime'],
                ],
                'value' => function ($event, $attribute) {
                    return $attribute == 'admit_datetime' ? $this->setThaiFormatdate($attribute,true) : $this->setThaiFormatdate($attribute);
                },
            ],
            [
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => ['birth', 'register_date','admit_datetime'],
                  ActiveRecord::EVENT_BEFORE_UPDATE => ['birth', 'register_date','admit_datetime'],
                ],
                'value' => function ($event, $attribute) {
                    return $attribute == 'admit_datetime' ? $this->setStandardFormatdate($attribute,true) : $this->setStandardFormatdate($attribute);
                },
            ],
            [
                'class' => AttributeValueBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['cid', 'father', 'mother'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['cid', 'father', 'mother'],
                ],
                'value' => function ($event,$attribute) {
                    return  str_replace('-','', $this->owner->$attribute);
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
            [['hospcode', 'hn', 'cid', 'prename', 'name', 'lname', 'sex', 'birth','mother','mother_name'], 'required'],
            [['birth', 'movein', 'ddischarge', 'd_update','register_date'], 'safe'],
            [['hospcode'], 'string', 'max' => 5],
            [['cid', 'father', 'mother', 'couple'], 'string', 'max' => 17],
            [['pid', 'hn', 'passport'], 'string', 'max' => 15],
            [['hid'], 'string', 'max' => 14],
            [['mother_name','father_name'], 'string', 'max' => 150],
            [['occupation_old', 'race', 'nation'], 'string', 'max' => 3],
            [['prename'], 'string', 'max' => 6],
            [['name', 'lname'], 'string', 'max' => 50],
            [['sex', 'mstatus', 'fstatus', 'vstatus', 'discharge', 'abogroup', 'rhgroup', 'typearea'], 'string', 'max' => 1],
            [['occupation_new'], 'string', 'max' => 4],
            [['religion', 'education', 'labor'], 'string', 'max' => 2],
            [['sex'], 'default', 'value' => 1],

            [['add_houseno'], 'string', 'max' => 10],
            [['add_road','add_village','add_soimain'], 'string', 'max' => 255],
            [['add_changwat','add_ampur','add_tambon'], 'string', 'max' => 2],
            ['add_zip', 'string', 'max' => 5],
            ['add_mobile', 'string', 'max' => 15],

            [['admit_age','newborn_at'], 'integer'],
            [['newborn_refer_from','admit_wardname'], 'string', 'max' => 150],
            [['admit_datetime'],'safe'],

            [['ga','lr_type','birth_weight','height','apgar'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'รหัสสถานพยาบาล',
            'cid' => 'เลขที่บัตรประชาชน',
            'pid' => 'HN',
            'hid' => 'Hid',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'hn' => 'เลขทะเบียนบุคคล (HN)',
            'sex' => 'เพศ',
            'birth' => 'วันเกิด',
            'mstatus' => 'Mstatus',
            'occupation_old' => 'Occupation Old',
            'occupation_new' => 'Occupation New',
            'race' => 'Race',
            'nation' => 'Nation',
            'religion' => 'Religion',
            'education' => 'Education',
            'fstatus' => 'Fstatus',
            'father' => 'เลขที่บัตรประชาชนพ่อ',
            'mother' => 'เลขที่บัตรประชาชนแม่',
            'couple' => 'Couple',
            'vstatus' => 'Vstatus',
            'movein' => 'Movein',
            'discharge' => 'Discharge',
            'ddischarge' => 'Ddischarge',
            'abogroup' => 'Abogroup',
            'rhgroup' => 'Rhgroup',
            'labor' => 'Labor',
            'passport' => 'Passport',
            'typearea' => 'Typearea',
            'd_update' => 'D Update',
            'fullName' => 'ชื่อ-นามสกุล',
            'hospitalName' => 'โรงพยาบาล',

            'add_houseno' => 'บ้านเลขที่',
            'add_village' => 'หมู่ที่',
            'add_soimain' => 'ซอย',
            'add_road' => 'ถนน',
            'add_changwat' => 'จังหวัด',
            'add_ampur' => 'อำเภอ',
            'add_tambon' => 'ตำบล',
            'add_zip' => 'รหัสไปรษณีย์',
            'add_mobile' => 'เบอร์โทรศัพท์มือถือ',

            'mother_name' => 'ชื่อ-นามสกุลแม่',
            'father_name' => 'ชื่อ-นามสกุลพ่อ',
            'register_date' => 'วันที่ลงทะเบียน',

            'newborn_at' => 'คลอดที่',
            'newborn_refer_from' => 'รับรีเฟอร์จากสถานพยาบาล',
            'admit_datetime' => 'วันที่ Admit',
            'admit_wardname' => 'ชื่อ Ward',
            'admit_age' => 'อายุ ณ วัน Admit',

            'lr_type' => 'ลักษณะการคลอด',
            'ga' => 'GA',
            'birth_weight' => 'Birth Weight',
            'Height' => 'Height',
            'apgar' => 'Apgar',

        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\query\PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
      return new \frontend\modules\nb\models\query\PersonQuery(get_called_class());
    }

    public function loadInitAddress($id,$type){
      return Address::find()->loadInit($id,$type)->column();
    }

    public function getFullName(){
      return $this->prename.$this->name.' '.$this->lname;
    }

    public function getHospital()
    {
        return $this->hasOne(Hospitals::className(), ['off_id' => 'hospcode']);
    }

    public function getHospitalName(){
        return $this->getRelationField('hospital','name');
    }

    /** ============================================================================================================
    * @referent http://php.net/manual/en/function.date-diff.php
    * PARA: Date Should In YYYY-MM-DD Format
    * ==============================================================================================================
    * RESULT FORMAT:
    *  '%y Year %m Month %d Day %h Hours %i Minute %s Seconds' =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
    *  '%y Year %m Month %d Day'                               =>  1 Year 3 Month 14 Days
    *  '%m Month %d Day'                                       =>  3 Month 14 Day
    *  '%d Day %h Hours'                                       =>  14 Day 11 Hours
    *  '%d Day'                                                =>  14 Days
    *  '%h Hours %i Minute %s Seconds'                         =>  11 Hours 49 Minute 36 Seconds
    *  '%i Minute %s Seconds'                                  =>  49 Minute 36 Seconds
    *  '%h Hours                                               =>  11 Hours
    *  '%a Days                                                =>  468 Days
    ===========================================================================***/

    public function dateDifference( $birth_date , $current_date, $differenceFormat = '%y' )
    {
        $interval  = date_diff(date_create($birth_date), date_create($current_date));
        return $interval->format($differenceFormat);
    }

    public function getCurrentAge( $format = '%y' ){
      return $this->dateDifference($this->getOldAttribute('birth'), date('Y-m-d'), $format);
    }

    public function setStandardFormatdate($field, $isDateTime = false){
      return (date('Y',strtotime($this->{$field}))-543).date('-m-d',strtotime($this->{$field})).($isDateTime==true? ' '.date('H:i:s',strtotime($this->{$field})) : null );
    }

    public function setThaiFormatdate($field, $isDateTime = false){
      if(in_array($this->{$field},['0000-00-00','0000-00-00 00:00:00']) || empty($this->{$field}))
      {
        return null;
      }
      return date('d-m-',strtotime($this->{$field})). (date('Y',strtotime($this->{$field}))+543).($isDateTime==true? ' '.date('H:i:s',strtotime($this->{$field})) : null );
    }
}
