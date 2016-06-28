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
                'content' => '',
                'url' => Url::to(['pku-screening', 'id' => $model->id]),
            ],
            [
                'label' => 'OAE Screening',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => Url::to(['oae-screening', 'id' => $model->id]),

            ],
            [
                'label' => 'IVH Screening',
                'content' => $this->render('_ivh-form',['model' => $model]),
                'options' => ['id' => 'ivh-id'],
                'url' => Url::to(['ivh-screening', 'id' => $model->id]),
                'active' => true
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
