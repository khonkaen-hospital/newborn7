<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientSp */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patient Sp',
]) . $model->hospcode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Sps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hospcode, 'url' => ['view', 'hospcode' => $model->hospcode, 'sp' => $model->sp, 'hn' => $model->hn]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patient-sp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
