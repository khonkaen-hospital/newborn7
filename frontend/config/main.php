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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['dixon'],
            'modelMap' => [
                'Profile' => 'common\models\Profile',
            ],
        ],
    ],
    'components' => [
        'authManager' => [
                'class' => 'yii\rbac\DbManager',
         ],
        'assetManager' => [
          'appendTimestamp' => true,
        ],
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'web_path' => '@web', // path alias to web base
            'base_path' => '@webroot', // path alias to web base
            'minify_path' => '@webroot/minify', // path alias to save minify result
            'js_position' => [ \yii\web\View::POS_END ], // positions of js files to be minified
            'force_charset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expand_imports' => true, // whether to change @import on content
            'compress_output' => true, // compress result html page
            'compress_options' => ['extra' => true], // options for compress
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'theme' => [
                'pathMap' => [
                    '@app/views/user' => '@common/views/user',
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'modules' => [
        'newborn7' => [
            'class' => 'frontend\modules\newborn7\Newborn7',
        ],
        'utility' => [
            'class' => 'c006\utility\migration\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'admins' => ['admin'],
            'modelMap' => [
                'Profile' => 'common\models\Profile',
            ],
            'mailer' => [
                'sender' => ['ihospitallog@gmail.com' => 'ระบบข้อมูลสุขภาพที่ 7'],
                'welcomeSubject' => 'ยินดีต้อนรับสู่ระบบข้อมูลสุขภาพที่ 7',
                'confirmationSubject' => 'ยืนยันการลงทะเบียนระบบข้อมูลสุขภาพที่ 7',
                'reconfirmationSubject' => 'ส่งข้อมูลรหัสยืนยันเพื่อลงทะเบียนระบบข้อมูลสุขภาพที่ 7',
                'recoverySubject' => 'กู้คืนระหัสผ่านระบบข้อมูลสุขภาพที่ 7'
            ],
            'controllerMap' => [
                'settings' => 'frontend\controllers\user\SettingsController'
            ],
        ]
    ]
];
