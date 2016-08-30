<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\classes\Debug;
use common\classes\UserFunction;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php echo \frontend\widgets\ShowLang::widget(); ?>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('menu','HEADER_MENU_HOME'), 'url' => ['/']],

        /*['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],*/

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('menu','HEADER_MENU_LOGIN'), 'url' => ['/login']];
    } else {
        $menuItems[] = ['label' => Yii::t('menu', 'MENU_PROFILE'), 'url' => ['/profile']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('menu','HEADER_MENU_LOGOUT'),
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <?php
        if (!Yii::$app->user->isGuest) {
            $role = UserFunction::getRole_user();
            //Debug::prn($role);
            if ($role['admin']) {
                $viewsMenu = '_admin-menu';
            }
            if ($role['moderator']) {
                $viewsMenu = '_moderator-menu';
            }
            if ($role['copywriter']) {
                $viewsMenu = '_copywriter-menu';
            }
           echo $this->render($viewsMenu);
        }
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
