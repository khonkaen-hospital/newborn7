<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\PatientSp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-sp-form">
    <br>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'calve_status')->radioList(['1' => 'คลอด รพ.', '2' => 'รับ Refer']) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'patient_sp_code')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>

        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'weigh')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'ga')->textInput() ?>
        </div>
        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'apgar')->textInput() ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'lr_type')->dropDownList(['1' => 'NL', '2' => 'C/S', '3' => 'Forcep']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'dexa')->textInput() ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'dose_brufen')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'dose_bt')->textInput() ?>
        </div>

        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'htc')->textInput() ?>
        </div>

        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'dtx')->textInput() ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'resuscltate')->dropDownList(['1' => 'YES', '2' => 'NO']) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'date_of_resuscltate')->widget(DatePicker::classname(), [
                'language' => 'th',
                'value' => date('dd/mm/yyyy'),
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd/mm/yyyy',
                    'todayHighlight' => true
                ]
            ]); ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'time_of_resuscltate')->widget(TimePicker::classname(), [
                'language' => 'th',
                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]
            ]); ?>
        </div>
        <div class="col-md-1 col-xs-12">
            <?= $form->field($model, 'ppv')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'cpr')->dropDownList(['1' => 'YES', '2' => 'NO']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'et_tube_status')->dropDownList(['1' => 'YES', '2' => 'NO']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'uvc')->dropDownList(['1' => 'YES', '2' => 'NO']) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'et_tube')->textInput() ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'o2')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'pdx')->dropDownList(['1' => 'โรค-1', '2' => 'โรค-2', '3' => 'โรค-3']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'dx')->checkboxList(['1'=>'dx-1', '2'=>'dx-2', '3'=>'dx-3', '4' => 'dx-4'],['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'comp')->checkboxList(['1'=>'comp-1', '2'=>'comp-2', '3'=>'comp-3', '4' => 'comp-4'],['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'proc')->checkboxList(['1'=>'proc-1', '2'=>'proc-2', '3'=>'proc-3', '4' => 'proc-4'],['maxlength' => true]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
