<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\tasks\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <label><?= Yii::t('tasks', 'Title')?>:</label> <?= $model->title; ?>
    <?= $form->field($model, 'title')->hiddenInput(['maxlength' => true])->label(false) ?>

    <label><?= Yii::t('tasks', 'Link')?>:</label> <?= $model->link; ?>
    <?= $form->field($model, 'link')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?php
        if(!empty($model->koment_moder)):
    ?>
            <label><?= Yii::t('tasks', 'Koment Moder')?>:</label> <?= $model->koment_moder; ?>
    <?php
        endif;
    ?>
    <?= $form->field($model, 'koment_moder')->hiddenInput(['rows' => 6])->label(false) ?>

    <?= $form->field($model, 'vihod_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false)->label(false) ?>


    <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

    <div class="form-group">

        <?= Html::submitButton(Yii::t('tasks', 'Submit'),['class' => 'btn btn-primary'])?>
        <?= Html::submitButton(Yii::t('tasks', 'Save to drafts'),['class' => 'btn btn-primary', 'name' => 'draft' ])?>
        <?/*= Html::submitButton($model->isNewRecord ? Yii::t('tasks', 'Create') : Yii::t('tasks', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) */?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
