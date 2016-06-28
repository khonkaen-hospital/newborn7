<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'visit_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospcode_seq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospcode_hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visit_date')->textInput() ?>

    <?= $form->field($model, 'tsh_pku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tsh_pku_date')->textInput() ?>

    <?= $form->field($model, 'tsh_pku_result')->textInput() ?>

    <?= $form->field($model, 'oae')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oae_date')->textInput() ?>

    <?= $form->field($model, 'oae_right')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oae_left')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oae_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oae_abr')->textInput() ?>

    <?= $form->field($model, 'ivh_ult_brain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ivh_date')->textInput() ?>

    <?= $form->field($model, 'ivh_result')->textInput() ?>

    <?= $form->field($model, 'rop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rop_date')->textInput() ?>

    <?= $form->field($model, 'rop_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rop_hosp_appointment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'appointment_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
