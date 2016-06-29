<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_vaccine`.
 */
class m160617_045039_create_patient_vaccine extends Migration
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
        $this->createTable('patient_vaccine', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->string(20),
            'current_weight' => $this->decimal(5,2),
            'hc' => $this->decimal(5,2),
            'length' => $this->decimal(5,2),
            'af' => $this->decimal(5,2),
            'milk' => $this->string(),
            'vaccine' => $this->string(),
            'vaccine_other' => $this->string(),
            'eye' => $this->string(),
            'eye_other' => $this->string(),
            'ear' => $this->string(),
            'ear_other' => $this->string(),
            'ult_brain' => $this->string(),
            'ref' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ],$tableOptions);

        $this->createIndex(
            'idx-patient-vaccine',
            'patient_vaccine',
            'visit_id'
        );

        // add foreign key for table patient_visit
        $this->addForeignKey(
            'fk-patient_vaccine-ref',
            'patient_vaccine',
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
        $this->dropTable('patient_vaccine');
    }
}
