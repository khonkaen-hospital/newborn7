<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_development`.
 */
class m160620_044250_create_patient_development extends Migration
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
        $this->createTable('patient_development', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->string(20),
            'develop' => $this->string(),
            'age' => $this->integer(),
            'ref' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ],$tableOptions);

        $this->createIndex(
            'idx-patient_development',
            'patient_development',
            'visit_id'
        );

        $this->addForeignKey(
            'fk-patient_development-patient_visit',
            'patient_development',
            'ref',
            'patient_visit',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_development');
    }
}
