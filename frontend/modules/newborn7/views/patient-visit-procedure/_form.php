<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitProcedure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-procedure-form">
<br>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'visit_id')->textInput(['readonly' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'procedcode')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'typegiag')->dropDownList(['OR' => 'OR', 'NONE-OR' => 'NONE-OR'], ['prompt' => '']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'typeicd')->dropDownList([9 => '9', 10 => '10', 'TM' => 'TM',], ['prompt' => '']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'diag')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
