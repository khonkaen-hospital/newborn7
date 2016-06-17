<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */

$this->title = 'Newborn Clinic';
$this->params['breadcrumbs'][] = ['label' => 'Patient Vaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-vaccine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
