<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">


    <?php $form = ActiveForm::begin(); ?>
    <br>
    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>ข้อมูลเบื้องต้น</h4></legend>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="form-group field-patient-hospcodeName">
                    <label class="control-label" for="patient-hospcodeName">สถานพยาบาล</label>
                    <input type="text" id="patient-hospcodeName"
                           value="<?= isset(Yii::$app->user->identity->profile->hospital) ? Yii::$app->user->identity->profile->hospital->name : 'กรุณาตั้งค่าสถานพยาบาลที่สังกัด!' ?>"
                           class="form-control" name="hospcodeName" readonly="" maxlength="20">
                           <?= $form->field($model, 'hospcode')->hiddenInput()->label(false) ?>
                </div>

            </div>

            <div class="col-md-3 col-xs-12">
              <div class="form-group field-patient-provName">
                  <label class="control-label" for="patient-provName">จังหวัด</label>
                  <input type="text" id="patient-ProvName"
                         value="<?= Yii::$app->user->identity->profile->provinceName?>"
                         class="form-control" name="ProvName" readonly="" maxlength="20">
                         <?= $form->field($model, 'prov')->hiddenInput()->label(false) ?>
              </div>
            </div>

            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1 col-xs-12">

                <?= $form->field($model, 'prename')->dropDownList(['1' => 'ด.ช.', '2' => 'ด.ญ.']); ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-1 col-xs-1">
                <?= $form->field($model, 'sex')->dropDownList(['1' => 'ชาย', '2' => 'หญิง']); ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
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
            <div class="col-md-1 col-xs-12">
                <?= $form->field($model, 'dead')->dropDownList(['1' => 'มีชีวิต', '2' => 'เสียชีวิต']) ?>
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>ข้อมูลที่อยู่</h4></legend>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'nation')->dropDownList([], []) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'province')->dropDownList([]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'amphoe')->dropDownList([]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'tumbol')->dropDownList([]) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'address')->textInput([]) ?>
            </div>
            <div class="col-md-1 col-xs-12">
                <?= $form->field($model, 'moo')->textInput() ?>
            </div>
            <div class="col-md-1 col-xs-12">
                <?= $form->field($model, 'soi')->textInput() ?>
            </div>
            <div class="col-md-1 col-xs-12">
                <?= $form->field($model, 'road')->textInput() ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'ban')->textInput() ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'addcode')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'zip')->widget(MaskedInput::className(), ['mask' => '9999']) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'tel')->widget(MaskedInput::className(), ['mask' => '999-999-999']) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'mobile')->widget(MaskedInput::className(), ['mask' => '999-999-9999']) ?>
            </div>
        </div>
    </fieldset>

    <br>
    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>บิดา/มารดา</h4></legend>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'mother_cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'mother_age')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'father_cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>รายละเอียดการคลอด (ข้อมูลการมา รพ.ครั้งแรก)</h4></legend>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'moi_checked')->dropDownList(['1' => 'คลอด รพ.', '2' => 'รับ Refer']) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'serviced')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'lr_type')->dropDownList(['NL' => 'NL', 'C/S' => 'C/S', 'Forcep' => 'Forcep']) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'high')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'weight')->textInput() ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'ga')->textInput() ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'apgar')->textInput() ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'inp_id')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?= $form->field($model, 'remark')->textarea(['maxlength' => true]) ?>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
