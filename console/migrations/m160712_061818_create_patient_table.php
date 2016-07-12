<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_table`.
 */
class m160712_061818_create_patient_table extends Migration
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
            'patient_id' => $this->primaryKey(),
        		'hospcode' => $this->string(5)->notNull(),
        		'prov' => $this->string(5)->notNull(),
        		'hn' => $this->string(15)->notNull(),
        		'an' => $this->string(15),
        		'seq' => $this->string(15),
        		'prename' => $this->string(5),
        		'fname' => $this->string(30),
        		'mname' => $this->string(30),
        		'lname' => $this->string(30),
        		'cid' => $this->string(20),
        		'dob' => $this->date(),
        		'sex' => 'ENUM(\'1\',\'2\') NULL DEFAULT \'2\'',
        		'dead' => $this->date(),
        		'mother_cid' =>$this->string(20),
        		'mother_name' => $this->string(50),
        		'mother_age' => $this->integer(3),
        		'mother_an' => $this->string(15),
        		'father_cid' => $this->string(20),
        		'father_name' => $this->string(50),
        		'nation' => $this->string(4),
        		'address' => $this->string(20),
        		'moo' => $this->string(4),
        		'soi' =>$this->string(40),
        		'road' => $this->string(50),
        		'ban' => $this->string(50),
        		'addcode' => $this->string(6),
        		'zip' => $this->string(5),
        		'tel' => $this->string(20),
        		'mobile' => $this->string(20),
        		'moi_checked' => 'TINYINT(4) NULL DEFAULT \'0\'',
        		'serviced' => $this->string(3),
        		'lr_type' =>$this->string(4),
        		'high' => 'FLOAT(3,2) NULL',
        		'weight' => $this->integer(4),
        		'ga' =>$this->integer(2),
        		'apgar' => $this->integer(3),
        		'remark' => 'LONGTEXT NULL',
        		'inp_id' =>$this->string(10),
        		'lastupdate' => 'TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ',
        ], $tableOptions);

        $this->createIndex('unique-hospcode-hn','patient',['hospcode','hn'],true);
        $this->createIndex('index-fname-lname','patient',['fname','lname']);
        $this->createIndex('index-cid','patient','cid');
        $this->createIndex('index-an','patient','an');
        $this->createIndex('index-mother_an','patient','mother_an');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient');
    }
}
