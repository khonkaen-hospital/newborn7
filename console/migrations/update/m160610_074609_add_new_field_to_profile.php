<?php

use yii\db\Migration;

/**
 * Handles adding new_field to table `profile`.
 */
class m160610_074609_add_new_field_to_profile extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%profile}}', 'province_code', $this->string(6));
        $this->addColumn('{{%profile}}', 'hcode', $this->string(6));
        $this->addColumn('{{%profile}}', 'title', $this->string(50));
        $this->addColumn('{{%profile}}', 'fname', $this->string(255));
        $this->addColumn('{{%profile}}', 'lname', $this->string(255));
        $this->addColumn('{{%profile}}', 'position', $this->string(255));
        $this->addColumn('{{%profile}}', 'position_level', $this->string(150));
        $this->addColumn('{{%profile}}', 'position_type', $this->integer());
        $this->addColumn('{{%profile}}', 'tel', $this->string(20));
        $this->addColumn('{{%profile}}', 'mobile', $this->string(20));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%profile}}', 'province_code');
        $this->dropColumn('{{%profile}}', 'hcode');
        $this->dropColumn('{{%profile}}', 'title');
        $this->dropColumn('{{%profile}}', 'fname');
        $this->dropColumn('{{%profile}}', 'lname');
        $this->dropColumn('{{%profile}}', 'position');
        $this->dropColumn('{{%profile}}', 'position_level');
        $this->dropColumn('{{%profile}}', 'position_type');
        $this->dropColumn('{{%profile}}', 'tel');
        $this->dropColumn('{{%profile}}', 'mobile');
    }
}
