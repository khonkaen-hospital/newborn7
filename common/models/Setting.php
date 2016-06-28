<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "co_setting".
 *
 * @property integer $id
 * @property string $type
 * @property string $key
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'value',
                ],
                'value' => function ($event) {
                    return utf8_encode(Yii::$app->getSecurity()->encryptByPassword($this->value , Yii::$app->params['app.secretKey']));
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => 'value',
                ],
                'value' => function ($event) {
                    return Yii::$app->getSecurity()->decryptByPassword(utf8_decode($this->value), Yii::$app->params['app.secretKey']);
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'co_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string'],
            [['type', 'key'], 'string', 'max' => 255],
            [['hcode'], 'string', 'max' => 10],
            [['created_by', 'updated_by'], 'integer', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'key' => 'Key',
            'value' => 'Value',
            'hcode' => 'Hospital code',
            'created_by' => 'Create by',
            'update_by' => 'Update by',
        ];
    }

    /**
     * @inheritdoc
     * @return SettingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SettingQuery(get_called_class());
    }

    public function itemsAilas($key){
      $items = [
        'driver'=>[
          'mysql' => 'Mysql',
          'pgsql' => 'PostgreSQL',
          'sqlsrv' => 'MS SQL Server(via sqlsrv driver)',
          'dblib' => 'MS SQL Server (via dblib driver)',
          'mssql' => 'MS SQL Server (via mssql driver)',
          'oci' => 'Oracle'
        ]
      ];
      return array_key_exists($key, $items) ? $items[$key] : [];
    }

    public function getDriverItems(){
      return $this->itemsAilas('driver');
    }

    public static function loadConfig($hcode){
        $connectDsnTemplage = '{driver}:host={host};dbname={database};port={port}';
        $connection = [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ];
        $settings =   static::find()
                      ->select('key','value')
                      ->indexBy('id')
                      ->where(['hcode'=>$hcode])
                      ->column();
                      print_r($settings);

        return $connection;
    }
}
