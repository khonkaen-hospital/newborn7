<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitVaccine */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Visit Vaccine',
]) . $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Vaccines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visit_id, 'url' => ['view', 'visit_id' => $model->visit_id, 'vaccine_no' => $model->vaccine_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-visit-vaccine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
