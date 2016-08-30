<?php

use yii\db\Migration;

/**
 * Handles adding draft to table `tasks`.
 */
class m160818_101723_add_draft_column_to_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('tasks', 'draft', $this->integer(11));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('tasks', 'draft');
    }
}
