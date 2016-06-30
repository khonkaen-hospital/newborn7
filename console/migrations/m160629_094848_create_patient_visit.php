<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_visit`.
 */
class m160629_094848_create_patient_visit extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('patient_visit', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%patient_visit}}', [
                    'visit_id' => 'INT(12) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`visit_id`)',
                    'seq' => 'VARCHAR(15) NOT NULL',
                    'hospcode' => 'VARCHAR(5) NOT NULL',
                    'hn' => 'VARCHAR(15) NOT NULL',
                    'date' => 'DATETIME NULL',
                    'clinic' => 'VARCHAR(6) NULL',
                    'pttype' => 'VARCHAR(6) NULL',
                    'age' => 'INT(3) NULL',
                    'age_type' => 'ENUM(\'0\',\'1\',\'2\',\'3\') NULL DEFAULT \'1\'',
                    'result' => 'VARCHAR(4) NULL',
                    'referin' => 'VARCHAR(5) NULL',
                    'referout' => 'VARCHAR(5) NULL',
                    'head_size' => 'FLOAT(3,1) NULL',
                    'height' => 'FLOAT(4,0) NULL',
                    'weight' => 'FLOAT(4,2) NULL',
                    'waist' => 'FLOAT(4,2) NULL',
                    'bp_max' => 'INT(3) NULL',
                    'bp_min' => 'INT(3) NULL',
                    'inp_id' => 'VARCHAR(15) NULL',
                    'tsh_pku' => 'VARCHAR(3) NULL',
                    'tsh_pku_date' => 'DATE NULL',
                    'tsh_pku_time' => 'TIME NULL',
                    'tsh_pku_result' => 'INT(11) NULL',
                    'oae' => 'VARCHAR(3) NULL',
                    'oae_date' => 'DATE NULL',
                    'oae_abr' => 'DATE NULL',
                    'oae_right' => 'VARCHAR(255) NULL',
                    'oae_left' => 'VARCHAR(255) NULL',
                    'oae_result' => 'VARCHAR(255) NULL',
                    'ivh_ult_brain' => 'VARCHAR(3) NULL',
                    'ivh_date' => 'DATE NULL',
                    'ivh_result' => 'INT(11) NULL',
                    'rop' => 'INT(3) NULL',
                    'rop_date' => 'DATE NULL',
                    'rop_result' => 'VARCHAR(255) NULL',
                    'rop_hosp_appointment' => 'VARCHAR(255) NULL',
                    'lastupdate' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
                    'created_by' => 'INT(20) NULL',
                    'updated_by' => 'INT(20) NULL',
                    'created_at' => 'INT(20) NULL',
                    'updated_at' => 'INT(20) NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_seq_2266_00', 'patient_visit', 'seq', 1);
        $this->createIndex('idx_date_2266_01', 'patient_visit', 'date', 0);

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%patient_visit}}', ['visit_id' => '1', 'seq' => '3232', 'hospcode' => '32332', 'hn' => '45566', 'date' => '2016-06-30 00:00:00', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '2323', 'referin' => '323', 'referout' => '323', 'head_size' => '99.9', 'height' => '32', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '32', 'inp_id' => '32', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:04:52', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467259492', 'updated_at' => '1467259492']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '2', 'seq' => '555', 'hospcode' => '66', 'hn' => '66', 'date' => '2016-06-30 00:00:00', 'clinic' => '66', 'pttype' => '66', 'age' => '66', 'age_type' => '0', 'result' => '6', 'referin' => '6', 'referout' => '6', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:05:48', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467259548', 'updated_at' => '1467259548']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '3', 'seq' => '234', 'hospcode' => '45', 'hn' => '55', 'date' => '2016-06-30 00:00:00', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:37:18', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467261438', 'updated_at' => '1467261438']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '4', 'seq' => 'r66', 'hospcode' => '666', 'hn' => '666', 'date' => '2016-06-30 00:00:00', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:45:10', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467261910', 'updated_at' => '1467261910']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '5', 'seq' => '455', 'hospcode' => '66', 'hn' => '6', 'date' => '2016-06-30 00:00:00', 'clinic' => '6', 'pttype' => '6', 'age' => '6', 'age_type' => '2', 'result' => '6', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:46:09', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467261969', 'updated_at' => '1467261969']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '6', 'seq' => '56', 'hospcode' => '656', 'hn' => '656', 'date' => '', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:48:17', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467262097', 'updated_at' => '1467262097']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '7', 'seq' => 'ss', 'hospcode' => '34', 'hn' => '43', 'date' => '2016-06-30 00:00:00', 'clinic' => '434', 'pttype' => '', 'age' => '', 'age_type' => '0', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 11:58:29', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467262709', 'updated_at' => '1467262709']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '8', 'seq' => 'ss', 'hospcode' => '344', 'hn' => '434', 'date' => '2016-06-30 00:00:00', 'clinic' => '434', 'pttype' => '', 'age' => '', 'age_type' => '0', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 12:00:10', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467262810', 'updated_at' => '1467262810']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '9', 'seq' => 'ss5', 'hospcode' => '3444', 'hn' => '4345', 'date' => '2016-06-30 00:00:00', 'clinic' => '434', 'pttype' => '', 'age' => '', 'age_type' => '0', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 12:00:44', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467262844', 'updated_at' => '1467262844']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '10', 'seq' => '4344', 'hospcode' => '44', 'hn' => '55', 'date' => '2016-06-30 00:00:00', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 12:04:06', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467263046', 'updated_at' => '1467263046']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '11', 'seq' => '556', 'hospcode' => '656', 'hn' => '656', 'date' => '2016-06-30 00:00:00', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 12:09:37', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467263377', 'updated_at' => '1467263377']);
        $this->insert('{{%patient_visit}}', ['visit_id' => '12', 'seq' => 'ถ', 'hospcode' => 'ภถภ', 'hn' => 'ถภถภ', 'date' => '', 'clinic' => '', 'pttype' => '', 'age' => '', 'age_type' => '', 'result' => '', 'referin' => '', 'referout' => '', 'head_size' => '', 'height' => '', 'weight' => '', 'waist' => '', 'bp_max' => '', 'bp_min' => '', 'inp_id' => '', 'tsh_pku' => '', 'tsh_pku_date' => '', 'tsh_pku_time' => '', 'tsh_pku_result' => '', 'oae' => '', 'oae_date' => '', 'oae_abr' => '', 'oae_right' => '', 'oae_left' => '', 'oae_result' => '', 'ivh_ult_brain' => '', 'ivh_date' => '', 'ivh_result' => '', 'rop' => '', 'rop_date' => '', 'rop_result' => '', 'rop_hosp_appointment' => '', 'lastupdate' => '2016-06-30 12:14:24', 'created_by' => '', 'updated_by' => '', 'created_at' => '1467263664', 'updated_at' => '1467263664']);
        $this->execute('SET foreign_key_checks = 1;');
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_visit');
    }
}
