<?php
use yii\bootstrap\Nav;

 ?>

 <?= Nav::widget([
    'encodeLabels'=>false,
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-plus"></i> ลงทะเบียน Newborn',
            'url' => ['/newborn7/patient-visit/create'],
            'linkOptions' => [],
        ],
        [
            'label' => ' ข้อมูลการมารับบริการ',
            'url' => '',
            'linkOptions' => [],
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                 ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
            ],
        ],
        [
            'label' => 'Login',
            'url' => ['site/login'],
            'visible' => Yii::$app->user->isGuest
        ],
    ],
    'options' => ['class' =>'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);?>
