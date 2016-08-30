<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'language' => 'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/language',
                    /*'sourceLanguage' => 'en',
                    'fileMap' => [
                        'button' => 'button.php',
                    ],*/
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'      => [
            'baseUrl' => '',
            'class' => 'frontend\components\LangRequest',

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'mainpage/default',
                '<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
                'login' => '/user/security/login',
                'profile' => '/user/settings/account',
                'tasks' => 'tasks/tasks',
                'user-tasks' => 'task_copywraiter/default',
                'user-tasks/run/<id:\d+>' => 'task_copywraiter/default/run_tasks',
                'moder-task' => 'task_moderator/default',
                'moder-task/check/<id:\d+>' => 'task_moderator/default/check_tasks',

                'free-tasks' => 'task_copywraiter/default/free_tasks',

                'users' => 'users/default',
                'stats-copy' => 'stats_copy/default',
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
    ],

    'modules' => [
        'mainpage' => [
            'class' => 'frontend\modules\mainpage\Mainpage',
        ],
        'tasks' => [
            'class' => 'frontend\modules\tasks\Tasks',
        ],
        'task_copywraiter' => [
            'class' => 'frontend\modules\task_copywraiter\TaskCopywraiter',
        ],
        'task_moderator' => [
            'class' => 'frontend\modules\task_moderator\TaskModerator',
        ],
        'users' => [
            'class' => 'frontend\modules\users\Users',
        ],
        'stats_copy' => [
            'class' => 'frontend\modules\stats_copy\StatsCopy',
        ],
    ],

    'params' => $params,
];
