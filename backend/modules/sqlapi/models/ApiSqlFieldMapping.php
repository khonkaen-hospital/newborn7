<?php

namespace backend\modules\sqlapi\models;

use Yii;

/**
 * This is the model class for table "api_sql_field_mapping".
 *
 * @property integer $id
 * @property string $field_name
 * @property string $group
 * @property string $type
 * @property string $sql
 * @property string $table
 * @property integer $status
 * @property string $params
 * @property string $comment
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class ApiSqlFieldMapping extends \yii\db\ActiveRecord
{
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
            [['sql', 'params', 'comment'], 'string'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['field_name', 'group', 'type', 'table', 'description'], 'string', 'max' => 255],
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
            'table' => 'Table',
            'status' => 'Status',
            'params' => 'Params',
            'comment' => 'Comment',
            'description' => 'Description',
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
