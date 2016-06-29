<?php

use yii\db\Migration;

/**
 * Handles the creation for table `sql_field_mapping`.
 */
class m160629_065727_create_sql_field_mapping extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('api_sql_field_mapping', [
            'id' => $this->primaryKey(),
            'field_name' => $this->string(),
            'group'=> $this->string(),
            'type'=> $this->string(),
            'sql' => $this->text(),
            'status' => $this->text(),
            'comment' => $this->integer(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('api_sql_field_mapping');
    }
}
