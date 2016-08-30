<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 15.08.2016
 * Time: 12:38
 */
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin();
$menuItems = [
    ['label' => Yii::t('menu', 'MENU_COPY_TASKS'), 'url' => ['/user-tasks']],
    ['label' => Yii::t('menu', 'MENU_FREE_TASKS'), 'url' => ['/free-tasks']],

];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItems,
]);
NavBar::end();
