<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient`.
 */
class m160719_054318_create_patient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('patient', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient');
    }
}
