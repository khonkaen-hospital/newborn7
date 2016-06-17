<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */

$this->title = 'Update Patient Vaccine: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Vaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-vaccine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
