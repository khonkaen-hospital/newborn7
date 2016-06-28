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
    <?php Pjax::begin(); ?>
    <?php echo Tabs::widget([
        'items' => [
            [
                'label' => 'TSH PKU Screening',
                'content' => '',
                'headerOptions' => [],
                'url' => Url::to(['pku-screening', 'id' => $model->id]),
            ],
            [
                'label' => 'OAE Screening',
                'content' => $this->render('_oae-form',['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'oae-id'],
                'url' => Url::to(['oae-screening', 'id' => $model->id]),
                'active' => true

            ],
            [
                'label' => 'IVH Screening',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => Url::to(['ivh-screening', 'id' => $model->id])
            ],
            [
                'label' => 'ROP Screening',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => Url::to(['rop-screening', 'id' => $model->id])
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
