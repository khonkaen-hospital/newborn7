<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "api_sql_field_mapping".
 *
 * @property integer $id
 * @property string $field_name
 * @property string $group
 * @property string $type
 * @property string $sql
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class ApiSqlFieldMapping extends \yii\db\ActiveRecord
{

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
    public static function tableName()
    {
        return 'api_sql_field_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sql', 'comment'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['field_name', 'group', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_name' => 'Field Name',
            'group' => 'Group',
            'type' => 'Type',
            'sql' => 'Sql',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @inheritdoc
     * @return ApiSqlFieldMappingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApiSqlFieldMappingQuery(get_called_class());
    }
}
