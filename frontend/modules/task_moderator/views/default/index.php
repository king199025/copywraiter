<?php
/**
 * @var $tasks common\models\db\Tasks
 */
$this->title = "Задания";
//\common\classes\Debug::prn($tasks);
?>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Название</th>
            <th>Статус</th>
            <th>Пользователь</th>
            <th>Действие</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task->title;?></td>
                <td><?= Yii::t('status', $task['status_tasks']->title); ?></td>
                <td>
                    <?= $task['user']->username?>
                </td>
                <td>
                    <?php
                    if($task->status == 3){
                        echo \yii\helpers\Html::a(Yii::t('tasks', 'Check'),\yii\helpers\Url::to(['/task_moderator/default/check_tasks','id' => $task->id]));
                    }
                    ?>
                </td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>