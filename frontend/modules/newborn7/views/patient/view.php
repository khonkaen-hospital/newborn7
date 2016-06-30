<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */

$this->title = $model->patient_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->patient_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->patient_id], [
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
            'patient_id',
            'hospcode',
            'prov',
            'hn',
            'an',
            'seq',
            'prename',
            'fname',
            'mname',
            'lname',
            'cid',
            'dob',
            'sex',
            'dead',
            'mother_cid',
            'mother_name',
            'mother_age',
            'mother_an',
            'father_cid',
            'father_name',
            'nation',
            'address',
            'moo',
            'soi',
            'road',
            'ban',
            'addcode',
            'zip',
            'tel',
            'mobile',
            'moi_checked',
            'serviced',
            'lr_type',
            'high',
            'weight',
            'ga',
            'apgar',
            'remark:ntext',
            'inp_id',
            'lastupdate',
        ],
    ]) ?>

</div>
