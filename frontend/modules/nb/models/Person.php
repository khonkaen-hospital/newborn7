<?php

namespace frontend\modules\nb\models;

use Yii;
use common\models\Hospitals;
use yii\behaviors\AttributeBehavior;
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
 * @property string $id
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
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => 'birth',
                ],
                'value' => function ($event) {
                    $this->adBirth = $this->birth;
                    return date('d-m-',strtotime($this->birth)). (date('Y',strtotime($this->birth))+543);
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
            [['hospcode', 'pid', 'prename', 'name', 'lname', 'sex', 'birth'], 'required'],
            [['birth', 'movein', 'ddischarge', 'd_update'], 'safe'],
            [['hospcode'], 'string', 'max' => 5],
            [['cid', 'father', 'mother', 'couple'], 'string', 'max' => 13],
            [['pid', 'hn', 'passport'], 'string', 'max' => 15],
            [['hid'], 'string', 'max' => 14],
            [['prename', 'occupation_old', 'race', 'nation'], 'string', 'max' => 3],
            [['name', 'lname'], 'string', 'max' => 50],
            [['sex', 'mstatus', 'fstatus', 'vstatus', 'discharge', 'abogroup', 'rhgroup', 'typearea'], 'string', 'max' => 1],
            [['occupation_new'], 'string', 'max' => 4],
            [['religion', 'education', 'labor'], 'string', 'max' => 2],
            [['id'], 'string', 'max' => 25],
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
            'birth' => 'วันเกิด (วัน-เดือน-ปีพ.ศ.)',
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
            'id' => 'ID',
            'fullName' => 'ชื่อ-นามสกุล'
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

    /** ===========================================================================
    * @referent http://php.net/manual/en/function.date-diff.php
    * PARA: Date Should In YYYY-MM-DD Format
    * RESULT FORMAT:
    *  '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
    *  '%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days
    *  '%m Month %d Day'                                            =>  3 Month 14 Day
    *  '%d Day %h Hours'                                            =>  14 Day 11 Hours
    *  '%d Day'                                                        =>  14 Days
    *  '%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
    *  '%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
    *  '%h Hours                                                    =>  11 Hours
    *  '%a Days                                                        =>  468 Days
    ===========================================================================***/

    public function dateDifference( $birth_date , $current_date, $differenceFormat = '%y' )
    {
        $interval  = date_diff(date_create($birth_date), date_create($current_date));
        return $interval->format($differenceFormat);
    }

    public function getCurrentAge( $format = '%y' ){
      return $this->dateDifference($this->adBirth, date('Y-m-d'), $format);
    }

}