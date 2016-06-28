<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PatientSpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-sp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_sp_code') ?>

    <?= $form->field($model, 'calve_status') ?>

    <?= $form->field($model, 'weigh') ?>

    <?= $form->field($model, 'ga') ?>

    <?php // echo $form->field($model, 'apgar') ?>

    <?php // echo $form->field($model, 'lr_type') ?>

    <?php // echo $form->field($model, 'dexa') ?>

    <?php // echo $form->field($model, 'dose_brufen') ?>

    <?php // echo $form->field($model, 'dose_bt') ?>

    <?php // echo $form->field($model, 'htc') ?>

    <?php // echo $form->field($model, 'dtx') ?>

    <?php // echo $form->field($model, 'resuscltate') ?>

    <?php // echo $form->field($model, 'date_of_resuscltate') ?>

    <?php // echo $form->field($model, 'time_of_resuscltate') ?>

    <?php // echo $form->field($model, 'ppv') ?>

    <?php // echo $form->field($model, 'cpr') ?>

    <?php // echo $form->field($model, 'et_tube_status') ?>

    <?php // echo $form->field($model, 'uvc') ?>

    <?php // echo $form->field($model, 'et_tube') ?>

    <?php // echo $form->field($model, 'o2') ?>

    <?php // echo $form->field($model, 'pdx') ?>

    <?php // echo $form->field($model, 'dx') ?>

    <?php // echo $form->field($model, 'dx_other') ?>

    <?php // echo $form->field($model, 'comp') ?>

    <?php // echo $form->field($model, 'comp_other') ?>

    <?php // echo $form->field($model, 'proc') ?>

    <?php // echo $form->field($model, 'proc_other') ?>

    <?php // echo $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'patient_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
