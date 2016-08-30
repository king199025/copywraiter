<?php

use yii\db\Migration;

class m160819_125431_add_column_dtchange_tasks_table extends Migration
{
    public function up()
    {
        $this->addColumn('tasks','dt_change', \yii\db\Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('tasks','dt_change');
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
