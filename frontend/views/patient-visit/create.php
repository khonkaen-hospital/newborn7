<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PatientVisit */

$this->title = 'Create Patient Visit';
$this->params['breadcrumbs'][] = ['label' => 'Patient Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-create">
    <?= $this->render('_form', [
        'model' => $model,
        'patientSp' => $patientSp
    ]) ?>

</div>
