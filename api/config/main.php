<?php

use PharIo\Manifest\Url;
use yii\rest\UrlRule;
use yii\web\JsonParser;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
            'v1' => [
                'class' => 'api\modules\v1\Module',
            ],
        ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => JsonParser::class,
            ]
        ],
        'user' => [
            'identityClass' => 'api\models\User',
            'enableAutoLogin' => true,
            'enableSession'=>false,
            // 'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

        // 'session' => [
        //     // this is the name of the session cookie used for login on the frontend
        //     'name' => 'advanced-api',
        // ],

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
        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => UrlRule::class, 'controller' => 'blog'],
                ['class' => UrlRule::class, 
                    'controller' => 'user',
                    'extraPatterns'=>[
                        'POST login'=>'login',
                    ],
                ],  
            ],
        ],

    ],
    'params' => $params,
];
