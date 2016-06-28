<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
      'authManager' => [
              'class' => 'yii\rbac\DbManager',
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
