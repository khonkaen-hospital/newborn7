<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDevelop */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Visit Develop',
]) . $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Develops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visit_id, 'url' => ['view', 'visit_id' => $model->visit_id, 'age_group' => $model->age_group, 'develop_no' => $model->develop_no]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-visit-develop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
