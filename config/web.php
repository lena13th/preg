<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$baseUrl = str_replace('/web', '', (new \yii\web\Request)->getBaseUrl());

$config = [
    'name' => 'Беременность +',
    'id' => 'basic',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout'=>'main',
        ],
        'components' => [
            'view' => [
                'theme' => [
                    'pathMap' => [
                        '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                    ],
                ],
            ],

        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'img', //path to origin images
            'imagesCachePath' => 'img/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/img/no_image.jpg', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
//            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableRegistration' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin', 'rustvk'],
            'mailer' => [
                'sender'                => 'mr-15@mail.ru', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Регистрация на сайте Беременность +',
                'confirmationSubject'   => 'Подтверждения смены пароля',
                'reconfirmationSubject' => 'Подтверждения смены email',
                'recoverySubject'       => 'Восстановление аккаунта',


//                'class' => 'yii\swiftmailer\Mailer',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
//                'useFileTransport' => false,
//                'transport' => [
//                    'class' => 'Swift_SmtpTransport',
//                    'host'=>'smtp.mail.ru',
//                    'username' => 'mr-15@mail.ru',
//                    'password' => 'nokia5530xpressmusic',
//                    'port' => '465',
//                    'encryption' => 'ssl',
//                ],
            ]
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ZqiOPBD7CLoxlKmC-dFNIsnkRs6iItiK',
            'baseUrl' => $baseUrl,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host'=>'smtp.mail.ru',
                'username' => 'mr-15@mail.ru',
                'password' => 'nokia5530xpressmusic',
                'port' => '465',
                'encryption' => 'ssl',
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
        'db' => $db,

        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                'images/' => '/images/image-by-item-and-alias',
//                'images/' => 'yii2images/images/image-by-item-and-alias',
//                'img/' => 'yii2images/images/image-by-item-and-alias',

                '' => 'site/index',
                'disease/' => 'disease/new',
                'disease/<id:\d+>'=>'disease/view',

                'hemostas/' => 'site/hemostas',
                'article/' => 'article/index',
                'article/<id:\d+>'=>'article/view',

                'reviews/' => 'site/reviews',
                'contacts/' => 'site/contacts',
                'services/' => 'services/index',
                'login/' => 'site/login',
                'admin/main/' => 'admin/main/view',

            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'img',
                'name' => 'Files'
            ],
        ]
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
