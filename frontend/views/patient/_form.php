<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">
    <?php $form = ActiveForm::begin(); ?>
    <br>
    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?= $form->field($model, 'dead')->radioList(['1'=>'มีชีวิต', '2' => 'เสียชีวิต'])->label(false) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true, 'readonly' => true]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'id_card')->widget(MaskedInput::className(),[ 'mask'=>'9-9999-99999-99-9' ])?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-1 col-xs-1">
                <?= $form->field($model, 'sex')->dropDownList(['1' => 'ชาย', '2' => 'หญิง']);?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
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
                <?= $form->field($model, 'at_birth')->widget(TimePicker::classname(), [
                    'language' => 'th',
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

            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'ward_admit')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'refer_receive')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'refer_to')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'exp')->widget(DatePicker::classname(), [
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
                <?= $form->field($model, 'exp_age')->textInput() ?>
            </div>
            <div class="col-md-1 col-xs-12">
                <?= $form->field($model, 'los')->textInput() ?>
            </div>

        </div>

    </fieldset>

    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>ข้อมูลที่อยู่</h4></legend>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'address')->textInput([]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'province')->textInput() ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'amphoe')->textInput() ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'district')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'postcode')->widget(MaskedInput::className(),[ 'mask'=>'9999' ])?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'phone')->widget(MaskedInput::className(),[ 'mask'=>'999-999-999' ])?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'mobile')->widget(MaskedInput::className(),[ 'mask'=>'999-999-9999' ])?>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>บิดา/มารดา</h4></legend>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'id_card_mum')->widget(MaskedInput::className(),[ 'mask'=>'9-9999-99999-99-9' ])?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'first_name_mum')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'last_name_mum')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'hn_mum')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'an_mum')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-1 col-xs-12">
                <?= $form->field($model, 'age_mum')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'id_card_papa')->widget(MaskedInput::className(),[ 'mask'=>'9-9999-99999-99-9' ])?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'first_name_papa')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'last_name_papa')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
