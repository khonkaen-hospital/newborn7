<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;
use yii\helpers\Url;

$this->title = 'Screening of Newbron';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="screening-of-newbron">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php Pjax::begin(); ?>
    <?php echo Tabs::widget([
        'items' => [
            [
                'label' => 'TSH PKU Screening',
                'content' => 'Anim pariatur cliche...',
                'url' => Url::to(['pku-screening']),
                'active' => true
            ],
            [
                'label' => 'OAE Screening',
                'content' => 'Anim pariatur cliche...',
                'headerOptions' => [],
                'options' => ['id' => 'myveryownID'],
                'url' => Url::to(['oae-screening'])

            ],
            [
                'label' => 'IVH Screening',
                'url' => Url::to(['ivh-screening'])
            ],
            [
                'label' => 'ROP Screening',
                'content' => 'Anim pariatur cliche...',
                'headerOptions' => [],
                'options' => ['id' => 'myveryownID'],
                'url' => Url::to(['rop-screening'])
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
