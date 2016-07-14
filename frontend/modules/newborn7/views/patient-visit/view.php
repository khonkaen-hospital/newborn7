<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->visit_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->visit_id], [
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
