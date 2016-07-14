<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
    <p class="pull-right">
        <?= Html::a('Update', ['update', 'id' => $model->visit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->visit_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
  </div>
  <div class="xpanel-body patient-visit-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'visit_id',
            'seq',
            'hospcode',
            'hn',
            'date',
            'clinic',
            'pttype',
            'age',
            'age_type',
            'result',
            'referin',
            'referout',
            'head_size',
            'height',
            'weight',
            'waist',
            'bp_max',
            'bp_min',
            'inp_id',
            'lastupdate',
        ],
    ]) ?>

  </div>
</div>
