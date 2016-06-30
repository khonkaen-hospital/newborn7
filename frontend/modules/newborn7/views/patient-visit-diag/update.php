<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDiag */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Visit Diag',
]) . $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Diags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visit_id, 'url' => ['view', 'id' => $model->visit_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-visit-diag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
