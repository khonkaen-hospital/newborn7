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
                    ActiveRecord::EVENT_AFTER_FIND => ['birth', 'register_date'],
                ],
                'value' => function ($event, $attribute) {
                    return $this->setThaiFormatdate($attribute);
                },
            ],
            // [
            //     'class' => AttributeValueBehavior::className(),
            //     'attributes' => [
            //       ActiveRecord::EVENT_BEFORE_INSERT => ['birth', 'register_date'],
            //       ActiveRecord::EVENT_BEFORE_UPDATE => ['birth', 'register_date'],
            //     ],
            //     'value' => function ($event, $attribute) {
            //         return $this->setStandardFormatdate($attribute);
            //     },
            // ],
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
            [['prename', 'occupation_old', 'race', 'nation'], 'string', 'max' => 3],
            [['name', 'lname'], 'string', 'max' => 50],
            [['sex', 'mstatus', 'fstatus', 'vstatus', 'discharge', 'abogroup', 'rhgroup', 'typearea'], 'string', 'max' => 1],
            [['occupation_new'], 'string', 'max' => 4],
            [['religion', 'education', 'labor'], 'string', 'max' => 2],
            [['sex'], 'default', 'value' => 1],
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
            'register_date' => 'วันที่ลงทะเบียน'
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

    public function loadInitAddress($id){
      return Address::find()->loadInit($id)->column();
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

    public function setStandardFormatdate($field){
      return (date('Y',strtotime($this->{$field}))-543).date('-m-d',strtotime($this->{$field}));
    }

    public function setThaiFormatdate($field){
      if($this->{$field} == '0000-00-00' || empty($this->{$field}))
      {
        return '00000000';
      }
      return date('d-m-',strtotime($this->{$field})). (date('Y',strtotime($this->{$field}))+543);
    }
}
