<?php

use yii\db\Migration;

class m160610_025358_rename_table_user extends Migration
{
    public function up()
    {
      $this->renameTable('user','user_');
    }

    public function down()
    {
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
