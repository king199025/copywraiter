<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `tasks`.
 */
class m160817_083543_add_user_id_column_to_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('tasks', 'user_id', $this->integer(11));
        $this->addColumn('tasks', 'dt_add', $this->integer(11));
        $this->addColumn('tasks', 'dt_update', $this->integer(11));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('tasks', 'user_id');
        $this->dropColumn('tasks', 'dt_add');
        $this->dropColumn('tasks', 'dt_update');
    }
}
