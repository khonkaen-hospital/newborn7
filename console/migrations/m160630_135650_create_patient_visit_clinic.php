<?php

use yii\db\Migration;

/**
 * Handles the creation for table `patient_visit_clinic`.
 */
class m160630_135650_create_patient_visit_clinic extends Migration
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
        $this->createTable('patient_visit_clinic', [
            'visit_id' => $this->integer(),
            'current_weight' => $this->string(),
            'hc' => $this->string(),
            'ref' => $this->integer(),
            'unused' => $this->dateTime(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ],$tableOptions);

        $this->createIndex(
            'idx-dev_item',
            'dev_item',
            'code_item'
        );

        // add foreign key for table patient_visit
        $this->addForeignKey(
            'fk-dev_item-group_item',
            'dev_item',
            'ref',
            'dev_item_group',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_visit_clinic');
    }
}
