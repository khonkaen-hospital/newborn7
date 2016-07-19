<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient',
]) . $model->patient_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient_id, 'url' => ['view', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div>
<div class="xpanel-body patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
