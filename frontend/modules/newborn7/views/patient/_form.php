<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use yii\widgets\MaskedInput;
use common\models\Profile;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use frontend\modules\newborn7\models\Changwat;
use frontend\modules\newborn7\models\Amphoe;
/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">
    <?php $form = ActiveForm::begin(); ?>
    <br>
    <fieldset>
        <legend><h4>ข้อมูลเบื้องต้น</h4></legend>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group field-patient-hospcodeName">
                    <label class="control-label" for="patient-hospcodeName">สถานพยาบาล</label>
                    <input type="text" id="patient-hospcodeName"
                           value="<?= isset(Yii::$app->user->identity->profile->hospital) ? Yii::$app->user->identity->profile->hospital->name : 'กรุณาตั้งค่าสถานพยาบาลที่สังกัด!' ?>"
                           class="form-control" name="hospcodeName" readonly="" maxlength="20">
                           <?= $form->field($model, 'hospcode')->hiddenInput()->label(false) ?>
                </div>

            </div>

            <div class="col-sm-3 ">
              <div class="form-group field-patient-provName">
                  <label class="control-label" for="patient-provName">จังหวัด</label>
                  <input type="text" id="patient-ProvName"
                         value="<?= Yii::$app->user->identity->profile->provinceName?>"
                         class="form-control" name="ProvName" readonly="" maxlength="20">
                         <?= $form->field($model, 'prov')->hiddenInput()->label(false) ?>
              </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'prename')->dropDownList($model->itemAlias('prename')); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'sex')->inline()->radioList($model->getItems('sex')); ?>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
              <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
                  'language' => 'th',
                  'type' => DatePicker::TYPE_COMPONENT_APPEND,
                  'pluginOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                      'todayHighlight' => true
                  ]
              ]); ?>
          </div>
          <div class="col-sm-4 ">
              <?= $form->field($model, 'cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
          </div>


        </div>
    </fieldset>
    <br>
    <fieldset>
        <legend><h4>ข้อมูลที่อยู่</h4></legend>
        <div class="row">
          <div class="col-md-2">
              <?= $form->field($model, 'address')->textInput([]) ?>
          </div>
          <div class="col-md-1">
              <?= $form->field($model, 'moo')->textInput() ?>
          </div>
          <div class="col-md-3">
              <?= $form->field($model, 'soi')->textInput() ?>
          </div>
          <div class="col-md-3">
              <?= $form->field($model, 'road')->textInput() ?>
          </div>
          <div class="col-md-3">
              <?= $form->field($model, 'ban')->textInput() ?>
          </div>

        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'province')->widget(Select2::classname(), [
                  'data' => Changwat::find()->select(['abbr'])->indexBy('code')->orderBy('abbr ASC')->column(),
                  'options' => ['id'=>'dd-changwat','placeholder' => 'เลือกจังหวัด ...'],
                  'pluginOptions' => [
                      'allowClear' => true
                  ],
              ]); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'amphoe')->widget(DepDrop::classname(), [
                   'options' => ['id'=>'dd-amphoe'],
                   'data'=>$model->isNewRecord ? [] : $model->loadInitAddress($model->amphoe),
                   'pluginOptions'=>[
                       'depends'=>['dd-changwat'],
                       'placeholder' => 'เลือกอำเภอ...',
                       'url' => Url::to(['/newborn7/patient/get-amphoe'])
                   ]
               ]) ?>
            </div>
            <div class="col-md-3">
              <?= $form->field($model, 'tumbol')->widget(DepDrop::classname(), [
                 'options' => ['id'=>'dd-tambon'],
                 'data'=>$model->isNewRecord ? [] : $model->loadInitAddress($model->tumbol),
                 'pluginOptions'=>[
                     'depends'=>['dd-amphoe'],
                     'placeholder' => 'เลือกอำเภอ...',
                     'url' => Url::to(['/newborn7/patient/get-tambon'])
                 ]
             ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'zip')->widget(MaskedInput::className(), ['mask' => '99999']) ?>
            </div>
        </div>

        <div class="row">

            <div class="col-md-2">
                <?= $form->field($model, 'tel')->widget(MaskedInput::className(), ['mask' => '999-999-999']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'mobile')->widget(MaskedInput::className(), ['mask' => '999-999-9999']) ?>
            </div>
            <!-- <div class="col-md-3">
                <?php //$form->field($model, 'nation')->dropDownList([], []) ?>
            </div> -->
        </div>

    </fieldset>

    <div class="form-group text-right">
      <?= Html::submitButton('บันทึกและลงทะเบียนการคลอด', ['class' =>  'btn btn-primary','name'=>'btn-save-newborn','value'=>1]) ?>
      <?= Html::submitButton('บันทึก' , ['class' => 'btn btn-default']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
