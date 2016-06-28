<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
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
}
