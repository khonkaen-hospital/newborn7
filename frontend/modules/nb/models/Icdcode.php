<?php

namespace frontend\modules\nb\models;

use Yii;

/**
 * This is the model class for table "icdcode".
 *
 * @property string $code
 * @property string $description
 * @property string $type
 * @property integer $status
 */
class Icdcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icdcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'description'], 'required'],
            [['description', 'type'], 'string'],
            [['status'], 'integer'],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'description' => 'Description',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return \frontend\modules\nb\models\query\IcdcodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\modules\nb\models\query\IcdcodeQuery(get_called_class());
    }
}
