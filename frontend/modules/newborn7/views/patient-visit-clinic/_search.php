<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitClinicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-clinic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'visit_id') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'seq') ?>

    <?= $form->field($model, 'ga') ?>

    <?php // echo $form->field($model, 'birth_weight') ?>

    <?php // echo $form->field($model, 'caregivers') ?>

    <?php // echo $form->field($model, 'current_weight') ?>

    <?php // echo $form->field($model, 'hc') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'af') ?>

    <?php // echo $form->field($model, 'clinic_date') ?>

    <?php // echo $form->field($model, 'milk') ?>

    <?php // echo $form->field($model, 'milk_other') ?>

    <?php // echo $form->field($model, 'vaccine') ?>

    <?php // echo $form->field($model, 'vaccine_other') ?>

    <?php // echo $form->field($model, 'eye') ?>

    <?php // echo $form->field($model, 'eye_other') ?>

    <?php // echo $form->field($model, 'ear') ?>

    <?php // echo $form->field($model, 'ear_other') ?>

    <?php // echo $form->field($model, 'ult_brain') ?>

    <?php // echo $form->field($model, 'ult_brain_result') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
