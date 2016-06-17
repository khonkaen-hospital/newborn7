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
                'content' => $this->render('_pku-form',['model' => $model]),
                'url' => Url::to(['pku-screening', 'id' => $model->id]),
                'active' => true
            ],
            [
                'label' => 'OAE Screening',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => 'pku_id'],
                'url' => Url::to(['oae-screening', 'id' => $model->id])

            ],
            [
                'label' => 'IVH Screening',
                'url' => Url::to(['ivh-screening', 'id' => $model->id])
            ],
            [
                'label' => 'ROP Screening',
                'content' => 'Anim pariatur cliche...',
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => Url::to(['rop-screening', 'id' => $model->id])
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
