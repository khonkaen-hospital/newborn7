<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'visit_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospcode_seq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospcode_hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visit_date')->textInput() ?>

    <?= $form->field($model, 'tsh_pku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tsh_pku_date')->textInput() ?>

    <?= $form->field($model, 'tsh_pku_result')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>