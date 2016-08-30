<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\tasks\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'koment_moder')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vihod_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>



    <a class="btn btn-primary selectUser">Выбрать исполнителя</a>
    <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('tasks', 'Create') : Yii::t('tasks', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
