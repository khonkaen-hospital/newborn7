<?php
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => [
        [
            'label' => 'Home',
            'url' => ['/newborn7/patient-visit/create'],
            'linkOptions' => []
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
]);
 ?>
