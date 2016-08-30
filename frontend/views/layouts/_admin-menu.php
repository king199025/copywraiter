<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 15.08.2016
 * Time: 12:37
 */
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

NavBar::begin();
$menuItems = [
    ['label' => Yii::t('menu', 'MENU_ADMIN_TASKS'), 'url' => ['/tasks']],
    ['label' => Yii::t('menu', 'MENU_CONTROL_USER'), 'url' => ['/user/admin/']],
    ['label' => Yii::t('menu', 'MENU_STATS_COPY'), 'url' => '/stats-copy']

];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItems,
]);
NavBar::end();

