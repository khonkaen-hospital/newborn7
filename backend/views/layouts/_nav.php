<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->params['app.brandLabel'],
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
} else {
    $menuItems[] = ['label' => 'ข้อมูลผู้ใช้งาน', 'url' => ['/user/admin/index']];
    $menuItems[] = ['label' => 'Account( ' . Yii::$app->user->identity->username . ' )', 'items'=>[
        ['label' => 'Profile', 'url' => ['/user/settings/profile']],
        ['label' => 'Account', 'url' => ['/user/settings/account']],
       '<li class="divider"></li>',
        ['label' => 'Logout', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']],
    ]];
    // $menuItems[] = '<li>'
    //     . Html::beginForm(['/site/logout'], 'post')
    //     . Html::submitButton(
    //         'Logout (' . Yii::$app->user->identity->username . ')',
    //         ['class' => 'btn btn-link']
    //     )
    //     . Html::endForm()
    //     . '</li>';

}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>
