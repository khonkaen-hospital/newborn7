<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules'=>[
     'sqlapi' => [
          'class' => 'backend\modules\sqlapi\Module',
      ],
      'user' => [
          'class' => 'dektrium\user\Module',
          'admins' => ['admin','pck','dixon'],
          'modelMap' => [
              'Profile' => 'common\models\Profile',
              'User' => 'common\models\user\User',
          ],
      ],
    ],
    'components' => [
      'authManager' => [
              'class' => 'yii\rbac\DbManager',
       ],
        'user' => [
            // 'identityClass' => 'dektrium\user\models\User',
            'identityClass' => 'common\models\user\User',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
