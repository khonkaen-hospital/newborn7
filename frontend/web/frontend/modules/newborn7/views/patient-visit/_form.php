<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'clinic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pttype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'age_type')->dropDownList([ '0', '1', '2', '3', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'head_size')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'waist')->textInput() ?>

    <?= $form->field($model, 'bp_max')->textInput() ?>

    <?= $form->field($model, 'bp_min')->textInput() ?>

    <?= $form->field($model, 'inp_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastupdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
