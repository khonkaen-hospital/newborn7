<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\models;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property User    $user
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class Profile extends \dektrium\user\models\Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'bioString'            => ['bio', 'string'],
            'publicEmailPattern'   => ['public_email', 'email'],
            'gravatarEmailPattern' => ['gravatar_email', 'email'],
            'websiteUrl'           => ['website', 'url'],
            'nameLength'           => ['name', 'string', 'max' => 255],
            'publicEmailLength'    => ['public_email', 'string', 'max' => 255],
            'gravatarEmailLength'  => ['gravatar_email', 'string', 'max' => 255],
            'locationLength'       => ['location', 'string', 'max' => 255],
            'websiteLength'        => ['website', 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'province_code'  => \Yii::t('user', 'จังหวัด'),
            'hcode'          => \Yii::t('user', 'โรงพยาบาล'),
            'title'          => \Yii::t('user', 'คำนำหน้า'),
            'fname'          => \Yii::t('user', 'ชื่อ'),
            'lname'          => \Yii::t('user', 'นามสกุล'),
            'position'       => \Yii::t('user', 'ตำแหน่ง'),
            'position_level' => \Yii::t('user', 'ระดับ'),
            'position_type'  => \Yii::t('user', 'ประเภทตำแหน่ง'),
            'personid'       => \Yii::t('user', 'เลขบัตรประชาชน'),
            'tel'       => \Yii::t('user', 'โทรศัพท์หน่วยงาน'),
            'mobile'       => \Yii::t('user', 'เบอร์โทรศัพท์มือถือ'),

            'name'           => \Yii::t('user', 'Name'),
            'public_email'   => \Yii::t('user', 'Email (public)'),
            'gravatar_email' => \Yii::t('user', 'Gravatar email'),
            'location'       => \Yii::t('user', 'Location'),
            'website'        => \Yii::t('user', 'Website'),
            'bio'            => \Yii::t('user', 'Bio'),
        ];
    }

}
