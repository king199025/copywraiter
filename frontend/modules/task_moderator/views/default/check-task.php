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




    <?= $form->field($model, 'vihod_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false)->label(false) ?>


    <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

    <div class="form-group">

        <table class="table">
            <tr>
                <td>
                    <?= Html::submitButton(Yii::t('tasks', 'Approve'),['class' => 'btn btn-success', 'name'=>'approve', 'value'=> 1])?>
                </td>
                <td>
                    <?= $form->field($model, 'koment_moder')->textarea(['rows' => 6]) ?>
                    <?= Html::submitButton(Yii::t('tasks', 'Rework'),['class' => 'btn btn-primary', 'name'=>'rework', 'value'=> 1])?>
                </td>
                <td>

                    <?= Html::textInput('penalti')?>
                    <?= Html::submitButton(Yii::t('tasks', 'Disapprove'),['class' => 'btn btn-danger', 'name'=>'disapprove', 'value'=> 1])?>
                </td>
            </tr>
        </table>








        <?/*= Html::submitButton($model->isNewRecord ? Yii::t('tasks', 'Create') : Yii::t('tasks', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) */?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
