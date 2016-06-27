<?php

use yii\db\Migration;

/**
 * Handles the creation for table `dev_item`.
 */
class m160621_015511_create_dev_item extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dev_item', [
            'id' => $this->primaryKey(),
            'code_item' => $this->string(),
            'item_name' => $this->string(),
            'ref' => $this->integer(),
            'unused' => $this->dateTime(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-dev_item',
            'dev_item',
            'code_item'
        );

        // add foreign key for table patient_visit
        $this->addForeignKey(
            'fk-dev_item-group_item',
            'dev_item',
            'ref',
            'dev_item_group',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dev_item');
    }
}
