<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVisit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-view">

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
        <?= Html::a('<i class="fa fa-plus"></i> Newborn Clinic', ['patient-vaccine/create', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'visit_id',
            'hospcode_seq',
            'hospcode_hn',
            'visit_date',
            'tsh_pku',
            'tsh_pku_date',
            'tsh_pku_result',
            'oae',
            'oae_date',
            'oae_right',
            'oae_left',
            'oae_result',
            'oae_abr',
            'ivh_ult_brain',
            'ivh_date',
            'ivh_result',
            'rop',
            'rop_date',
            'rop_result',
            'rop_hosp_appointment',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'appointment_no',
        ],
    ]) ?>

</div>
