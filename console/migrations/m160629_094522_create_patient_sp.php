<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_sp`.
 */
class m160629_094522_create_patient_sp extends Migration
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
        if (!in_array('patient_sp', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%patient_sp}}', [
                    'hospcode' => 'VARCHAR(5) NOT NULL',
                    0 => 'PRIMARY KEY (`hospcode`)',
                    'sp' => 'VARCHAR(4) NOT NULL',
                    1 => 'KEY (`sp`)',
                    'hn' => 'VARCHAR(20) NOT NULL',
                    2 => 'KEY (`hn`)',
                    'lastupdate' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
                    'created_by' => 'INT(20) NULL',
                    'updated_by' => 'INT(20) NULL',
                    'created_at' => 'INT(20) NULL',
                    'updated_at' => 'INT(20) NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_sp_0276_00','patient_sp','sp',0);
        $this->createIndex('idx_hospcode_0276_01','patient_sp','hospcode',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_patient_027_00','{{%patient_sp}}', 'hospcode', '{{%patient}}', 'hospcode', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_patient_027_01','{{%patient_sp}}', 'hn', '{{%patient}}', 'hn', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_serviceplan_027_02','{{%patient_sp}}', 'sp', '{{%serviceplan}}', 'code', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'57088681','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'58066255','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59020020','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59020032','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59020080','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59020115','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59020250','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59020721','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59028574','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59029161','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59029328','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59030092','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient_sp}}',['hospcode'=>'10670','sp'=>'NB','hn'=>'59030104','lastupdate'=>'2016-06-30 09:44:05','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_sp');
    }
}
