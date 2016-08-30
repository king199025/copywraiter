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
    ['label' => Yii::t('menu','MENU_ADMIN_TASKS'), 'url' => ['/moder-task']],
    ['label' => Yii::t('menu', 'MENU_USERS'), 'url' => ['/users']],
    /*['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],*/
];

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItems,
]);
NavBar::end();
