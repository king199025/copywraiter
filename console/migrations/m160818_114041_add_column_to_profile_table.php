<?php

use yii\db\Migration;
use yii\db\Schema;

class m160818_114041_add_column_to_profile_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%profile}}', 'limit', Schema::TYPE_INTEGER);
        $this->addColumn('{{%profile}}', 'penalti', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('{{%profile}}', 'limit');
        $this->dropColumn('{{%profile}}', 'penalti');
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
