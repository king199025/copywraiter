<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\tasks\models\Tasks */

$this->title = Yii::t('tasks', 'Update {modelClass}: ', [
    'modelClass' => 'Tasks',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tasks', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('tasks', 'Update');
?>
<div class="tasks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
