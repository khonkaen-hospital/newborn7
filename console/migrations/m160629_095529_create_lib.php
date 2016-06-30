<?php

use yii\db\Migration;

/**
 * Handles the creation for table `lib`.
 */
class m160629_095529_create_lib extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('lib', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('lib');
    }
}
