<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-vaccine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'current_weight') ?>

    <?= $form->field($model, 'hc') ?>

    <?= $form->field($model, 'length') ?>

    <?= $form->field($model, 'af') ?>

    <?php // echo $form->field($model, 'milk') ?>

    <?php // echo $form->field($model, 'vaccine') ?>

    <?php // echo $form->field($model, 'vaccine_other') ?>

    <?php // echo $form->field($model, 'eye') ?>

    <?php // echo $form->field($model, 'eye_other') ?>

    <?php // echo $form->field($model, 'ear') ?>

    <?php // echo $form->field($model, 'ear_other') ?>

    <?php // echo $form->field($model, 'ult_brain') ?>

    <?php // echo $form->field($model, 'ref') ?>

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
