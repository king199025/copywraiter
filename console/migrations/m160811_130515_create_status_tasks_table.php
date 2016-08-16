<?php

use yii\db\Migration;

/**
 * Handles the creation for table `status_tasks`.
 */
class m160811_130515_create_status_tasks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('status_tasks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);

        $this->insert('status_tasks',
            [
                'id' => 1,
                'title' => 'STATUS_TASK_NEW'
            ]
        );

        $this->insert('status_tasks',
            [
                'id' => 2,
                'title' => 'STATUS_TASK_IN_HAND'
            ]
        );

        $this->insert('status_tasks',
            [
                'id' => 3,
                'title' => 'STATUS_TASK_MODERATION'
            ]
        );

        $this->insert('status_tasks',
            [
                'id' => 4,
                'title' => 'STATUS_TASK_BEN_REJECTED'
            ]
        );
        $this->insert('status_tasks',
            [
                'id' => 5,
                'title' => 'STATUS_TASK_DONE'
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('status_tasks');
    }
}
