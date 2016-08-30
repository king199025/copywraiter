<?php
/**
 * @var $tasks common\models\db\Tasks
 */
$this->title = "Мои задания";
//\common\classes\Debug::prn($tasks);
?>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Название</th>
            <th>Статус</th>
            <th>Действие</th>
            <th></th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task->title;?></td>
                <td><?= Yii::t('status', $task['status_tasks']->title); ?></td>
                <td>
                    <?php
                        if($task->status == 1 || $task->status == 6){
                            echo \yii\helpers\Html::a(Yii::t('tasks', 'Start execution'),\yii\helpers\Url::to(['/task_copywraiter/default/run_tasks','id' => $task->id]));
                        }
                        if($task->draft == 1 && $task->status != 3){
                            echo \yii\helpers\Html::a(Yii::t('tasks', 'continue the'),\yii\helpers\Url::to(['/task_copywraiter/default/run_tasks','id' => $task->id]));
                        }
                    ?>
                </td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>