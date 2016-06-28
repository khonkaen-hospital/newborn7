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
    'components' => [
       'view' => [
          'theme' => [
              'pathMap' => [
                  '@app/views' => '@common/views',
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
                    'class' => 'yii\log\FileTarget',
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
    'modules'=>[
      'user'=>[
              'class' => 'dektrium\user\Module',
              'enableFlashMessages'   => false,
               'admins' => ['admin'],
               'modelMap' => [
                    'Profile' => 'common\models\Profile',
               ],
              'mailer' => [
                  'sender'                => ['ihospitallog@gmail.com' => 'ระบบข้อมูลสุขภาพที่ 7'],
                  'welcomeSubject'        => 'ยินดีต้อนรับสู่ระบบข้อมูลสุขภาพที่ 7',
                  'confirmationSubject'   => 'ยืนยันการลงทะเบียนระบบข้อมูลสุขภาพที่ 7',
                  'reconfirmationSubject' => 'ส่งข้อมูลรหัสยืนยันเพื่อลงทะเบียนระบบข้อมูลสุขภาพที่ 7',
                  'recoverySubject'       => 'กู้คืนระหัสผ่านระบบข้อมูลสุขภาพที่ 7'
              ],
              'controllerMap' => [
                  'settings' => 'frontend\controllers\user\SettingsController'
              ],
          ]
    ]
];
