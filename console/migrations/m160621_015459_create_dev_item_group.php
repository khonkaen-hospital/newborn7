<?php

use yii\db\Migration;

/**
 * Handles the creation for table `dev_item_group`.
 */
class m160621_015459_create_dev_item_group extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dev_item_group', [
            'id' => $this->primaryKey(),
            'code_group' => $this->string(),
            'name_group' => $this->string(),
            'unused' => $this->dateTime(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dev_item_group');
    }
}
