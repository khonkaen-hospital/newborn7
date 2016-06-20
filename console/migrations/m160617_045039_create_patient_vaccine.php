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
        $this->createTable('patient_vaccine', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->string(20),
            'current_weight' => $this->decimal(5,2),
            'hc' => $this->decimal(5,2),
            'length' => $this->decimal(5,2),
            'af' => $this->decimal(5,2),
            'milk' => $this->string(2),
            'vaccine' => $this->string(2),
            'vaccine_other' => $this->string(),
            'eye' => $this->string(2),
            'eye_other' => $this->string(),
            'ear' => $this->string(2),
            'ear_other' => $this->string(),
            'ult_brain' => $this->string(2),
            'ref' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

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