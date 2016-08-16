<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tasks`.
 */
class m160811_130142_create_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'link' => $this->string(255)->notNull(),
            'koment_moder' => $this->text(),
            'vihod_text' => $this->text(),
            'status' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tasks');
    }
}
