<?php

namespace frontend\modules\newborn7\models;

use Yii;

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
 * @property string $serviced
 * @property string $lr_type
 * @property double $high
 * @property integer $weight
 * @property integer $ga
 * @property integer $apgar
 * @property string $remark
 * @property string $inp_id
 * @property string $lastupdate
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'prov', 'hn'], 'required'],
            [['dob', 'dead', 'lastupdate'], 'safe'],
            [['sex', 'remark'], 'string'],
            [['mother_age', 'moi_checked', 'weight', 'ga', 'apgar'], 'integer'],
            [['high'], 'number'],
            [['hospcode', 'prov', 'prename', 'zip'], 'string', 'max' => 5],
            [['hn', 'an', 'seq', 'mother_an'], 'string', 'max' => 15],
            [['fname', 'mname', 'lname'], 'string', 'max' => 30],
            [['cid', 'mother_cid', 'father_cid', 'address', 'tel', 'mobile'], 'string', 'max' => 20],
            [['mother_name', 'father_name', 'road', 'ban'], 'string', 'max' => 50],
            [['nation', 'moo', 'lr_type'], 'string', 'max' => 4],
            [['soi'], 'string', 'max' => 40],
            [['addcode'], 'string', 'max' => 6],
            [['serviced'], 'string', 'max' => 3],
            [['inp_id'], 'string', 'max' => 10],
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
            'hospcode' => 'Hospcode',
            'prov' => 'Prov',
            'hn' => 'Hn',
            'an' => 'An',
            'seq' => 'Seq',
            'prename' => 'Prename',
            'fname' => 'Fname',
            'mname' => 'Mname',
            'lname' => 'Lname',
            'cid' => 'Cid',
            'dob' => 'Dob',
            'sex' => 'Sex',
            'dead' => 'Dead',
            'mother_cid' => 'Mother Cid',
            'mother_name' => 'Mother Name',
            'mother_age' => 'Mother Age',
            'mother_an' => 'Mother An',
            'father_cid' => 'Father Cid',
            'father_name' => 'Father Name',
            'nation' => 'Nation',
            'address' => 'Address',
            'moo' => 'Moo',
            'soi' => 'Soi',
            'road' => 'Road',
            'ban' => 'Ban',
            'addcode' => 'Addcode',
            'zip' => 'Zip',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'moi_checked' => 'Moi Checked',
            'serviced' => 'Serviced',
            'lr_type' => 'Lr Type',
            'high' => 'High',
            'weight' => 'Weight',
            'ga' => 'Ga',
            'apgar' => 'Apgar',
            'remark' => 'Remark',
            'inp_id' => 'Inp ID',
            'lastupdate' => 'Lastupdate',
        ];
    }

    /**
     * @inheritdoc
     * @return PatientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatientQuery(get_called_class());
    }
}
