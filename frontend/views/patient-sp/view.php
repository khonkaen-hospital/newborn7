<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PatientSp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Sps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-sp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'patient_sp_code',
            'calve_status',
            'weigh',
            'ga',
            'apgar',
            'lr_type',
            'dexa',
            'dose_brufen',
            'dose_bt',
            'htc',
            'dtx',
            'resuscltate',
            'date_of_resuscltate',
            'time_of_resuscltate',
            'ppv',
            'cpr',
            'et_tube_status',
            'uvc',
            'et_tube',
            'o2',
            'pdx',
            'dx',
            'dx_other',
            'comp',
            'comp_other',
            'proc',
            'proc_other',
            'hospcode',
            'patient_id',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
