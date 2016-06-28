<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PatientSp */

$this->title = 'Update Patient Sp: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Sps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-sp-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
