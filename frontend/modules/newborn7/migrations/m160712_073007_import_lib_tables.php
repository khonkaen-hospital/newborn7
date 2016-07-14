<?php

use yii\db\Migration;

class m160712_073007_import_lib_tables extends Migration
{
    public function up()
    {
        // $sqlFile = Yii::getAlias('@frontend').'/modules/newborn7/migrations/sql/lib.sql';
        //   if (file_exists ( $sqlFile )) {
    		// 	$sqlArray = file_get_contents ( $sqlFile );
    		// 	$cmd = Yii::$app->db->createCommand ( $sqlArray );
    		// 	try {
    		// 		$cmd->execute ();
    		// 	} catch ( Exception $e ) {
    		// 		$message = $e->getMessage ();
    		// 	}
    		// }
    }

    public function down()
    {
        $this->dropTable('lib_addr');
        $this->dropTable('lib_address');
        $this->dropTable('lib_hcode');
        $this->dropTable('lib_health_region');
        $this->dropTable('lib_hospcode');
        $this->dropTable('lib_hospital');
        $this->dropTable('lib_hospital_level');
        $this->dropTable('lib_hosptype');
        $this->dropTable('lib_position_type');
        $this->dropTable('lib_province');
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
