<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_sp`.
 */
class m160628_034902_create_patient_sp extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('patient_sp', [
            'id' => $this->primaryKey(),
            'patient_sp_code' => $this->string(20),
            'calve_status' => $this->integer(2),
            'weigh' => $this->decimal(10,2),
            'ga' => $this->integer(),
            'apgar' => $this->time(),
            'lr_type' => $this->integer(2),
            'dexa' => $this->integer(5),
            'dose_brufen' => $this->integer(5),
            'dose_bt' => $this->integer(5),
            'htc' => $this->integer(5),
            'dtx' => $this->integer(5),
            'resuscltate' => $this->integer(2),
            'date_of_resuscltate' => $this->date(),
            'time_of_resuscltate' => $this->time(),
            'ppv' => $this->integer(2),
            'cpr' => $this->integer(2),
            'et_tube_status' => $this->integer(2),
            'uvc' => $this->integer(2),
            'et_tube' => $this->integer(4),
            'o2' => $this->integer(4),

            'pdx' => $this->integer(4),
            'dx' => $this->string(),
            'dx_other' => $this->string(),
            'comp' => $this->string(),
            'comp_other' => $this->string(),
            'proc' => $this->string(),
            'proc_other' => $this->string(),

            'hospcode' => $this->string(20),
            'patient_id' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),

        ]);

        $this->createIndex(
            'idx-patient_sp-sp_code',
            'patient_sp',
            'patient_sp_code'
        );


        $this->addForeignKey(
            'fk-patient_patient-sp',
            'patient_sp',
            'patient_id',
            'patient',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-patient_patient-hospcode',
            'patient_sp',
            'hospcode',
            'patient',
            'hospcode',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_sp');
    }
}
