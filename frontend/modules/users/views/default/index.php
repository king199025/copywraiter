<?php
/**
 * @var $user common\models\User
 */
use yii\helpers\Html;

?>

<table class="table">

    <?php foreach($user as $item): ?>
        <tr>
            <td><?= $item->username?></td>
            <td><?= $item['profile']->limit ?></td>
            <td><?= $item['profile']->penalti ?></td>
            <!--<td><?php /*//\common\classes\Debug::prn($item->blocked_at) ;*/?>
                <?php /*if(!empty($item->blocked_at)){
                    echo Html::a(Yii::t('user', 'Unblock'), ['block', 'id' => $item->id], [
                        'class' => 'btn btn-xs btn-success',
                        'data-method' => 'post',
                        'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
                    ]);
                }
                 else{
                     echo Html::a(Yii::t('user', 'Block'), ['block', 'id' => $item->id], [
                         'class' => 'btn btn-xs btn-danger',
                         'data-method' => 'post',
                         'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
                     ]);
                 }
                */?>
            </td>
            <td>
                <?/*= Html::a(Yii::t('users', 'edit'), ['edit', 'id' => $item->id], [
                    'class' => 'btn btn-xs btn-danger'
                ])*/?>
            </td>-->
        </tr>
    <?php endforeach; ?>
</table>
