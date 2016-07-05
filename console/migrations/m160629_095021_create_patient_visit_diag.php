<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_visit_diag`.
 */
class m160629_095021_create_patient_visit_diag extends Migration
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
        if (!in_array('patient_visit_diag', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%patient_visit_diag}}', [
                    'visit_id' => 'INT(12) NOT NULL',
                    0 => 'PRIMARY KEY (`visit_id`)',
                    'diagcode' => 'VARCHAR(7) NULL',
                    'typegiag' => 'INT(1) NULL',
                    'typeicd' => 'ENUM(\'10\',\'TM\') NULL DEFAULT \'10\'',
                    'diag' => 'VARCHAR(200) NULL',
                    'lastupdate' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
                    'created_by' => 'INT(20) NULL',
                    'updated_by' => 'INT(20) NULL',
                    'created_at' => 'INT(20) NULL',
                    'updated_at' => 'INT(20) NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_patient_visit_584_00','{{%patient_visit_diag}}', 'visit_id', '{{%patient_visit}}', 'visit_id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_visit_diag');
    }
}
