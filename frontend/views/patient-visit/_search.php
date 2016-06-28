<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'visit_id') ?>

    <?= $form->field($model, 'hospcode_seq') ?>

    <?= $form->field($model, 'hospcode_hn') ?>

    <?= $form->field($model, 'visit_date') ?>

    <?php // echo $form->field($model, 'tsh_pku') ?>

    <?php // echo $form->field($model, 'tsh_pku_date') ?>

    <?php // echo $form->field($model, 'tsh_pku_result') ?>

    <?php // echo $form->field($model, 'oae') ?>

    <?php // echo $form->field($model, 'oae_date') ?>

    <?php // echo $form->field($model, 'oae_right') ?>

    <?php // echo $form->field($model, 'oae_left') ?>

    <?php // echo $form->field($model, 'oae_result') ?>

    <?php // echo $form->field($model, 'oae_abr') ?>

    <?php // echo $form->field($model, 'ivh_ult_brain') ?>

    <?php // echo $form->field($model, 'ivh_date') ?>

    <?php // echo $form->field($model, 'ivh_result') ?>

    <?php // echo $form->field($model, 'rop') ?>

    <?php // echo $form->field($model, 'rop_date') ?>

    <?php // echo $form->field($model, 'rop_result') ?>

    <?php // echo $form->field($model, 'rop_hosp_appointment') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'appointment_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
