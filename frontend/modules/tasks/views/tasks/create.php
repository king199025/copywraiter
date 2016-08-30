<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\tasks\models\Tasks */

$this->title = Yii::t('tasks', 'Create Tasks');
$this->params['breadcrumbs'][] = ['label' => Yii::t('tasks', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status' => $status,
    ]) ?>

</div>
<!-- Modal -->
<div class="modal fade" id="selectUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Выберите исполнителя</h4>
            </div>
            <div class="modal-body select--user--body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

            </div>
        </div>
    </div>
</div>