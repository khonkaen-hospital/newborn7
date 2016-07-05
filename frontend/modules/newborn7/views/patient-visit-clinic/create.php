<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitClinic */

$this->title = Yii::t('app', 'Create Patient Visit Clinic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Clinics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-clinic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
