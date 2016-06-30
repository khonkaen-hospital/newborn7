<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientSp */

$this->title = $model->hospcode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Sps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-sp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'hospcode' => $model->hospcode, 'sp' => $model->sp, 'hn' => $model->hn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'hospcode' => $model->hospcode, 'sp' => $model->sp, 'hn' => $model->hn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hospcode',
            'sp',
            'hn',
            'lastupdate',
        ],
    ]) ?>

</div>
