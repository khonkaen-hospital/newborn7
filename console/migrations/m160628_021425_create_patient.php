<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient`.
 */
class m160628_021425_create_patient extends Migration
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
        $this->createTable('patient', [
            'id' => $this->primaryKey(),
            'hospcode' => $this->string(20),
            'hn' => $this->string(20),
            'an' => $this->string(20),
            'id_card' => $this->string(20),
            'first_name' => $this->string(100),
            'last_name' => $this->string(100),
            'sex' => $this->integer(1),
            'birth_date' => $this->date(),
            'at_birth' => $this->time(),
            'ward_admit' => $this->string(),
            'refer_receive' => $this->string(),
            'refer_to' => $this->string(),

            'dead' => $this->integer(2),
            'exp' => $this->date(),
            'exp_age' => $this->integer(3),
            'los' => $this->integer(5),

            'address' => $this->text(),
            'province' => $this->integer(10),
            'amphoe' => $this->integer(10),
            'district' => $this->integer(10),
            'postcode' => $this->integer(10),
            'phone' => $this->string(20),
            'mobile' => $this->string(20),

            'id_card_mum' => $this->string(20),
            'first_name_mum' => $this->string(100),
            'last_name_mum' => $this->string(100),
            'hn_mum' => $this->string(20),
            'an_mum' => $this->string(20),
            'age_mum' => $this->string(20),
            'id_card_papa' => $this->string(20),
            'first_name_papa' => $this->string(100),
            'last_name_papa' => $this->string(100),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),

        ],$tableOptions);

        $this->createIndex(
            'idx-patient-hospcode',
            'patient',
            'hospcode'
        );

        $this->createIndex(
            'idx-patient-hn',
            'patient',
            'hn'
        );

        $this->createIndex(
            'idx-patient-an',
            'patient',
            'an'
        );

        $this->createIndex(
            'idx-patient-id_card',
            'patient',
            'id_card'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient');
    }
}
