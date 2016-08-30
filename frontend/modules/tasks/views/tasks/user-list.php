<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 17.08.2016
 * Time: 11:30
 */

\common\classes\Debug::prn($user);

?>
<table class="table table-striped">
    <tbody>
    <tr>
        <th class="danger">Логин</th>
        <th class="danger">Штрафнае баллы</th>
        <th class="danger">Действие</th>
    </tr>
    <?php foreach($user as $item): ?>
        <tr>
            <td>
                <?= $item->username;?>
            </td>
            <td>
                <span class="btn btn-success pick--user" data-id="<?= $item->id;?>">Выбрать</span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
