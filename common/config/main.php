<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone'=>'Asia/Bangkok',
    'components' => [
      'log' => [
          'traceLevel' => YII_DEBUG ? 3 : 0,
          'targets' => [
              [
                  'class' => 'yii\log\DbTarget',
                  'levels' => ['error', 'warning'],
              ],
          ],
      ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
            'theme' => [
              'pathMap' => [
                  '@dektrium/user/views' => '@common/views/user'
                  ],
             ],
        ],
    ],
    'modules' => [
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
        ],
    ],
];
