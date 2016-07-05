<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientSp */

$this->title = Yii::t('app', 'Create Patient Sp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Sps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-sp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
