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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
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
        ],$tableOptions);

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
