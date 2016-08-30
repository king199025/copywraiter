<?php
/**
 * @var $tasks common\models\db\Tasks
 */
$this->title = "Свободные задания";
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

                        if(\common\classes\TascsUser::GetLimitUserTasks()){
                            echo \yii\helpers\Html::a(Yii::t('tasks', 'Start execution'),\yii\helpers\Url::to(['/task_copywraiter/default/run_tasks','id' => $task->id]));
                        }
                        else{
                            echo Yii::t('tasks', 'limit');
                        }


                    ?>
                </td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>