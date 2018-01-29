<?php
use yii\web\Request;


$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['admin'],
            'controllerMap' => [
                'admin' => 'app\modules\admin\controllers\UserController',
                'registration' => 'app\controllers\UserRegistrationController'
            ],
            'modelMap' =>[
                'User' => 'app\models\user\User',
            ]
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin'
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'controllerMap' => [
                'rule' => 'app\modules\admin\controllers\UserRuleController',
                'assigment' => 'app\modules\admin\controllers\UserAssignmentController',
                'permission' => 'app\modules\admin\controllers\UserPermissionController',
                'role' => 'app\modules\admin\controllers\UserRoleController',
            ],
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7TEfcHYXO4oO8c7HZFg6MwWAmyyFYEX7',
            'baseUrl' => $baseUrl,
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => '1724508714523327',
                    'clientSecret' => '4ca2cd5f08b0205570723fe3f66b6605',
                ],
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'fWVA5gW91EsRMl6pwrPgKZckH',
                    'consumerSecret' => 'mJYrTujpBOQAkRtL71cttTLPS28gVNBiuCIRBfP8i5bvSI2Cwa',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '40632274323-rrue04pnjg85f754c9vmnrc09cs93pvb.apps.googleusercontent.com',
                    'clientSecret' => 'hdtqQdVtYIymqqZ_GVvSOdEf',
                ],
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '6156152',
                    'clientSecret' => 'tgrx1xpcCIjjcfufcSzE',
                ]
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d MMMM yyyy, H:i',
            'datetimeFormat' => 'php:d F Y, H:i',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Europe/Minsk',
            'locale' => 'ru-RU'
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
