<?php

use yii\db\Migration;

/**
 * Handles the creation for table `serviceplan`.
 */
class m160629_121354_create_serviceplan extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('serviceplan', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('serviceplan');
    }
}
