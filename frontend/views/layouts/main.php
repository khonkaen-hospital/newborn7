<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;
use kartik\widgets\Growl;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['app.brandLabel'],
        'brandUrl' => Yii::$app->homeUrl,
        'renderInnerContainer'=>true,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        //['label' => 'หน้าหลัก', 'url' => ['/site/index']],

        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
    } else {
      // $menuItems[] = ['label' => 'ข้อมูล New Born', 'items' => [
      //   ['label' => 'บันทึก KPI', 'url' => ['/newborn7/patient/create']],
      //   ['label' => 'ข้อมูล New Born', 'url' => ['/newborn7/patient/index']],
      // ]];
       $menuItems[] = ['label' => '<i class="glyphicon glyphicon-plus"></i> '.'ทะเบียน', 'url' => ['/nb/person/index']];
       $menuItems[] = ['label' => '<i class="glyphicon glyphicon-save-file"></i> '.'นำเข้าทะเบียน', 'url' => ['/nb/person/import']];
       $menuItems[] = ['label' => 'บัญชี ('.Yii::$app->user->identity->username .')', 'items' => [
            ['label' => 'Profile', 'url' => ['/user/settings/profile']],
            ['label' => 'Api Setting', 'url' => ['/api-settings/index']],
            '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
        ]];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=Yii::$app->params['app.copyright']?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
