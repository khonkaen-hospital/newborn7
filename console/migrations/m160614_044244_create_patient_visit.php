<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_visit`.
 */
class m160614_044244_create_patient_visit extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('patient_visit', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->string(20),
            'hospcode_seq' => $this->string(20)->unique(),
            'hospcode_hn' => $this->string(20),
            'visit_date' => $this->integer(20),

            'tsh_pku' => $this->string(3),
            'tsh_pku_date' => $this->date(),
            'tsh_pku_time' => $this->time(),
            'tsh_pku_result' => $this->integer(),

            'oae' => $this->string(3),
            'oae_date' => $this->date(),
            'oae_right' => $this->string(),
            'oae_left' => $this->string(),
            'oae_result' => $this->string(),
            'oae_abr' => $this->date(),

            'ivh_ult_brain' => $this->string(3),
            'ivh_date' => $this->date(),
            'ivh_result' => $this->integer(),

            'rop' => $this->string(3),
            'rop_date' => $this->date(),
            'rop_result' => $this->string(),
            'rop_hosp_appointment' => $this->string(),

            'created_at' => $this->integer(20),
            'updated_at' => $this->integer(20),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),

            'appointment_no' => $this->integer(3),
        ]);

        $this->createIndex(
            'idx-patient_visit-id',
            'patient_visit',
            'visit_id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_visit');
    }
}
