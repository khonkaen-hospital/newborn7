<?php

use yii\db\Migration;

/**
 * Handles the creation for table `items_alias`.
 */
class m160826_022835_create_items_alias_table extends Migration
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

        $this->createTable('lib_items_alias', [
            'id' => $this->primaryKey(),
            'group' => $this->string(),
            'key' => $this->string(),
            'value' => $this->text(),
        ],$tableOptions);

        $this->createIndex(
            'group-key-unique',
            'lib_items_alias',
            ['group','key'],
            true
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('lib_items_alias');
    }
}
