<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-form">

<?php $form = ActiveForm::begin(); ?>
<fieldset>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <legend><h4>ข้อมูล Visit</h4></legend>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'seq')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'hn')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'clinic')->dropDownList([], ['maxlength' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'pttype')->dropDownList([], ['maxlength' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'age')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'age_type')->dropDownList(['0', '1', '2', '3',], ['prompt' => '']) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'referin')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'referout')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'head_size')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'height')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'weight')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'waist')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'bp_max')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'bp_min')->textInput() ?>
        </div>

        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'inp_id')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
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
    </div>
</fieldset>

<fieldset>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <legend><h4>ข้อมูล TSK PKU</h4></legend>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'tsh_pku')->dropDownList(['Yes' => 'Yes', 'No' => 'No'], ['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'tsh_pku_date')->widget(DatePicker::classname(), [
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
        <div class="col-md-2 col-xs-2">
            <?= $form->field($model, 'tsh_pku_time')->widget(TimePicker::classname(), [
                'value' => '',
                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-xs-12">
            <?= $form->field($model, 'tsh_pku_result')->textarea(['rows' => 5]) ?>
        </div>
    </div>

</fieldset>

<fieldset>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <legend><h4>ข้อมูล OAE</h4></legend>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'oae')->dropDownList(['Yes' => 'Yes', 'No' => 'No'], ['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'oae_date')->widget(DatePicker::classname(), [
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
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'oae_abr')->widget(DatePicker::classname(), [
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
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-6">
            <?= $form->field($model, 'oae_right')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-xs-6">
            <?= $form->field($model, 'oae_left')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'oae_result')->textarea(['rows' => 5]) ?>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <legend><h4>ข้อมูล IVH ULT BRAIN</h4></legend>
        </div>
        <div class="col-md-3 col-xs-12">
            <?= $form->field($model, 'ivh_ult_brain')->dropDownList(['Yes' => 'Yes', 'No' => 'No'], ['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'ivh_date')->widget(DatePicker::classname(), [
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
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'ivh_result')->textarea(['rows' => 5]) ?>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <legend><h4>ข้อมูล ROP</h4></legend>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'rop')->dropDownList(['Yes' => 'Yes', 'No' => 'No'], ['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'rop_date')->widget(DatePicker::classname(), [
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
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'rop_hosp_appointment')->widget(Select2::classname(), [
                'data' => ['10670' => 'โรงพยาบาลศูนย์ขอนแก่น'],
                'language' => 'th',
                'options' => ['placeholder' => 'ค้นหาโรงพยาบาล'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'rop_result')->textarea(['rows' => 5]) ?>
        </div>
    </div>
</fieldset>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '<i class=""></i> บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
