<div class="table-responsive">
<table class="table">
<tr>
    <th>Login</th>
    <th>Email</th>
    <th>Status</th>
    <th>Penalti</th>
    <th>limit</th>
</tr>
<?php

foreach($user as $item):?>
    <tr>
        <td><?= $item->username;?></td>
        <td><?= $item->email;?></td>
        <td><?php
            if(empty($item->blocked_at)){
                echo "Активирован";
            }else{
                echo "Заблокирован";
            }
            ?>
        </td>
        <td><?= $item['profile']->limit ?></td>
        <td><?= $item['profile']->penalti ?></td>
    </tr>
<?php endforeach;?>
    </table></div>