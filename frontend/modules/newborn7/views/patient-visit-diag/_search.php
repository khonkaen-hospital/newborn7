<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDiagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-diag-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'visit_id') ?>

    <?= $form->field($model, 'diagcode') ?>

    <?= $form->field($model, 'typegiag') ?>

    <?= $form->field($model, 'typeicd') ?>

    <?= $form->field($model, 'diag') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
