<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 19.08.2016
 * Time: 14:32
 */
use kartik\date\DatePicker;

?>

<h1>Ваша статистика</h1>
<div>
    <span>Выполнено заданий успешно:</span><?= $taskAply;?>
</div>
<div>
    <span>Заданий на модерации:</span><?= $taskModer;?>
</div>
<div>
    <span>Отклоненных заданий:</span><?= $taskDelay;?>
</div>

<h2>Посмотреть статистику</h2>


<?php
echo 'From';
echo DatePicker::widget([
    'name' => 'from',
    'type' => DatePicker::TYPE_INPUT,
    'value' => '',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy'
    ]
]);

echo 'To';
echo DatePicker::widget([
    'name' => 'to',
    'type' => DatePicker::TYPE_INPUT,
    'value' => '',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy'
    ]
]);
?>

    <input type="button" data-csrf="<?= Yii::$app->request->getCsrfToken()?>" name="otpr" id="" class="stat__send" value="Посмотреть">


<div class="stats">

</div>