<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'Update Patient Visit: ' . $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visit_id, 'url' => ['view', 'id' => $model->visit_id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div>
  <div class="xpanel-body patient-visit-update">

      <?= $this->render('_form', [
          'model' => $model,
      ]) ?>

  </div>
</div>
