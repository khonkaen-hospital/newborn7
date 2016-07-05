<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient`.
 */
class m160629_093758_create_patient extends Migration
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
        if (!in_array('patient', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%patient}}', [
                    'patient_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`patient_id`)',
                    'hospcode' => 'VARCHAR(5) NOT NULL',
                    'prov' => 'VARCHAR(2) NULL',
                    'hn' => 'VARCHAR(15) NOT NULL',
                    'an' => 'VARCHAR(15) NULL',
                    'seq' => 'VARCHAR(15) NULL',
                    'prename' => 'VARCHAR(5) NULL',
                    'fname' => 'VARCHAR(30) NULL',
                    'mname' => 'VARCHAR(30) NULL',
                    'lname' => 'VARCHAR(30) NULL',
                    'cid' => 'VARCHAR(20) NULL',
                    'dob' => 'DATE NULL',
                    'sex' => 'ENUM(\'1\',\'2\') NULL DEFAULT \'2\'',
                    'dead' => 'DATE NULL',
                    'mother_cid' => 'VARCHAR(20) NULL',
                    'mother_name' => 'VARCHAR(50) NULL',
                    'mother_age' => 'INT(3) NULL',
                    'mother_an' => 'VARCHAR(15) NULL',
                    'father_cid' => 'VARCHAR(20) NULL',
                    'father_name' => 'VARCHAR(50) NULL',
                    'nation' => 'VARCHAR(4) NULL',
                    'address' => 'VARCHAR(20) NULL',
                    'moo' => 'VARCHAR(4) NULL',
                    'soi' => 'VARCHAR(40) NULL',
                    'road' => 'VARCHAR(40) NULL',
                    'ban' => 'VARCHAR(50) NULL',
                    'addcode' => 'VARCHAR(6) NULL',
                    'zip' => 'VARCHAR(5) NULL',
                    'tel' => 'VARCHAR(20) NULL',
                    'mobile' => 'VARCHAR(20) NULL',
                    'moi_checked' => 'TINYINT(4) NULL DEFAULT \'0\'',
                    'serviced' => 'INT(3) NULL',
                    'lr_type' => 'VARCHAR(4) NULL',
                    'high' => 'FLOAT(3,2) NULL',
                    'weight' => 'INT(4) NULL',
                    'ga' => 'INT(2) NULL',
                    'apgar' => 'INT(3) NULL',
                    'remark' => 'LONGTEXT NULL',
                    'inp_id' => 'VARCHAR(10) NULL',
                    'lastupdate' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
                    'created_by' => 'INT(20) NULL',
                    'updated_by' => 'INT(20) NULL',
                    'created_at' => 'INT(20) NULL',
                    'updated_at' => 'INT(20) NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_hospcode_0714_00','patient','hospcode',1);
        $this->createIndex('idx_cid_0714_01','patient','cid',0);
        $this->createIndex('idx_fname_0714_02','patient','fname',0);
        $this->createIndex('idx_an_0714_03','patient','an',0);
        $this->createIndex('idx_mother_an_0714_04','patient','mother_an',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%patient}}',['patient_id'=>'1','hospcode'=>'10670','prov'=>'40','hn'=>'59030104','an'=>'','seq'=>'','prename'=>'ดญ.','fname'=>'บุตรนางรักชนก','mname'=>'','lname'=>'เนื่องโนราช','cid'=>'0','dob'=>'2016-05-07','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'นางรักชนก','mother_age'=>'','mother_an'=>'','father_cid'=>'','father_name'=>'นายวินัย','nation'=>'','address'=>'','moo'=>'','soi'=>'','road'=>'','ban'=>'','addcode'=>'','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'','high'=>'','weight'=>'','ga'=>'','apgar'=>'','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'2','hospcode'=>'10670','prov'=>'40','hn'=>'59030092','an'=>'','seq'=>'','prename'=>'ดญ.','fname'=>'บุตรนางสุชาดา','mname'=>'','lname'=>'จันทร์โสม','cid'=>'0','dob'=>'2016-05-07','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'นางสุชาดา','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'','moo'=>'','soi'=>'','road'=>'','ban'=>'','addcode'=>'4009','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'','high'=>'','weight'=>'0','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'3','hospcode'=>'10670','prov'=>'40','hn'=>'59029161','an'=>'','seq'=>'','prename'=>'ดช.','fname'=>'ธนัท','mname'=>'','lname'=>'อิ่มสำอางค์','cid'=>'1409904513834','dob'=>'2016-05-03','sex'=>'1','dead'=>'','mother_cid'=>'','mother_name'=>'น.ส.ชุติมา เฮ้าทา','mother_age'=>'','mother_an'=>'','father_cid'=>'','father_name'=>'นายธนกฤษ อิ่มสำอางค์','nation'=>'','address'=>'','moo'=>'','soi'=>'','road'=>'','ban'=>'','addcode'=>'40','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'','high'=>'','weight'=>'','ga'=>'','apgar'=>'','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'4','hospcode'=>'10670','prov'=>'40','hn'=>'59029328','an'=>'5927199','seq'=>'','prename'=>'ดช.','fname'=>'วันชัย','mname'=>'','lname'=>'สิทธิโคตร','cid'=>'1409904514113','dob'=>'2016-05-03','sex'=>'1','dead'=>'','mother_cid'=>'','mother_name'=>'น.ส.ประภาวดี แผ่นเงิน','mother_age'=>'','mother_an'=>'','father_cid'=>'','father_name'=>'นายสุภี สิทธิโคตร','nation'=>'','address'=>'','moo'=>'','soi'=>'','road'=>'','ban'=>'','addcode'=>'400909','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'','high'=>'','weight'=>'','ga'=>'','apgar'=>'','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'5','hospcode'=>'10670','prov'=>'40','hn'=>'59028574','an'=>'5927199','seq'=>'20160509223235','prename'=>'ดช.','fname'=>'อนุสร','mname'=>'','lname'=>'ประไชโย','cid'=>'1409904513320','dob'=>'2016-04-29','sex'=>'1','dead'=>'','mother_cid'=>'','mother_name'=>'น.ส.สุมิตรา โกธา','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'นายปกรณ์เกียรติ ประไชโย','nation'=>'','address'=>'41/2','moo'=>'4','soi'=>'-','road'=>'-','ban'=>'','addcode'=>'401803','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'0','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'6','hospcode'=>'10670','prov'=>'40','hn'=>'59020020','an'=>'5919635','seq'=>'20160510101914','prename'=>'ด.ช.','fname'=>'ธนกฤต','mname'=>'','lname'=>'พ่วงคำมี','cid'=>'1409904504347','dob'=>'2016-03-27','sex'=>'1','dead'=>'','mother_cid'=>'','mother_name'=>'นางจุฑามาศ บุญมาทอง','mother_age'=>'0','mother_an'=>'5919631','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'95/16','moo'=>'3','soi'=>'','road'=>'','ban'=>'','addcode'=>'400101','zip'=>'40000','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'3200','ga'=>'38','apgar'=>'9','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'7','hospcode'=>'10670','prov'=>'40','hn'=>'59020032','an'=>'5919654','seq'=>'20160509102906','prename'=>'ด.ญ.','fname'=>'อชิรญาห์','mname'=>'','lname'=>'จันชา','cid'=>'1409904504517','dob'=>'2016-03-27','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'330','moo'=>'10','soi'=>'','road'=>'','ban'=>'','addcode'=>'401701','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'3400','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'8','hospcode'=>'10670','prov'=>'40','hn'=>'59020721','an'=>'5920307','seq'=>'J3293375','prename'=>'ด.ญ.','fname'=>'ปภาวดี','mname'=>'','lname'=>'กลางหล้า','cid'=>'1409904505068','dob'=>'2016-03-29','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'176','moo'=>'12','soi'=>'','road'=>'','ban'=>'','addcode'=>'400709','zip'=>'','tel'=>'1336','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'2900','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'9','hospcode'=>'10670','prov'=>'40','hn'=>'59020250','an'=>'5919819','seq'=>'J3282238','prename'=>'ด.ญ.','fname'=>'นันท์นภา','mname'=>'','lname'=>'เรืองประทุม','cid'=>'1409400049492','dob'=>'2016-03-28','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'20','moo'=>'8','soi'=>'','road'=>'','ban'=>'','addcode'=>'4001','zip'=>'','tel'=>'1049','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'2800','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'10','hospcode'=>'10670','prov'=>'40','hn'=>'59020115','an'=>'5919769','seq'=>'J3281122','prename'=>'ด.ญ.','fname'=>'รตพร','mname'=>'','lname'=>'พรมบุญเรือง','cid'=>'1409904504339','dob'=>'2016-03-28','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'192','moo'=>'8','soi'=>'','road'=>'','ban'=>'','addcode'=>'4001','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'3100','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'11','hospcode'=>'10670','prov'=>'40','hn'=>'59020080','an'=>'5919717','seq'=>'J3270573','prename'=>'ด.ช.','fname'=>'ธรรมคีตะ','mname'=>'','lname'=>'ตรีชาลี','cid'=>'1409904504118','dob'=>'2016-03-27','sex'=>'1','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'330','moo'=>'10','soi'=>'','road'=>'','ban'=>'','addcode'=>'4001','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'2700','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'12','hospcode'=>'10670','prov'=>'40','hn'=>'58066255','an'=>'5859192','seq'=>'I9293690','prename'=>'ด.ช.','fname'=>'สิวพร','mname'=>'','lname'=>'มอไธสง','cid'=>'1409904453874','dob'=>'2015-09-29','sex'=>'1','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'62','moo'=>'11','soi'=>'','road'=>'','ban'=>'','addcode'=>'4015','zip'=>'','tel'=>'','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'2800','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->insert('{{%patient}}',['patient_id'=>'13','hospcode'=>'10670','prov'=>'39','hn'=>'57088681','an'=>'5770974','seq'=>'HB243340','prename'=>'ด.ญ.','fname'=>'นันธิดา','mname'=>'','lname'=>'โกศล','cid'=>'1407700082191','dob'=>'2014-11-24','sex'=>'2','dead'=>'','mother_cid'=>'','mother_name'=>'','mother_age'=>'0','mother_an'=>'','father_cid'=>'','father_name'=>'','nation'=>'','address'=>'180','moo'=>'11','soi'=>'','road'=>'','ban'=>'','addcode'=>'400407','zip'=>'','tel'=>'1030','mobile'=>'','moi_checked'=>'0','serviced'=>'','lr_type'=>'NL','high'=>'','weight'=>'1000','ga'=>'0','apgar'=>'0','remark'=>'','inp_id'=>'','lastupdate'=>'2016-06-30 09:44:37','created_by'=>'','updated_by'=>'','created_at'=>'','updated_at'=>'']);
        $this->execute('SET foreign_key_checks = 1;');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient');
    }
}
