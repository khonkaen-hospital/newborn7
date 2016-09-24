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
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'แก้ไขประวัติ');
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการคลอด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getFullname(), 'url' => ['update', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = 'ข้อมูลการคลอด'
?>

<?= $this->render('_menus',[
  'id' => $id
])?>
<div class="xpanel-tab">
  <!-- <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div> -->
  <div class="xpanel-body patient-update">

    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
        <legend><h4>ข้อมูลการรับเข้ารักษา </h4></legend>

      <div class="row">
        <div class="col-md-6">
          <?= $form->field($model, 'type')->inline()->checkBoxList($model->getItems('newborn_type')) ?>
        </div>
        <div class="col-md-6">
              <?= $form->field($model, 'type_refer_from')->widget(Select2::className(),[
                    'size' => Select2::SMALL,
                    'options' => ['placeholder' => 'เลือกสถานพยาบาล... '],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => '#',
                            'dataType' => 'json',
                            'delay'=> 250,
                            'cache'=>true,
                            'data' => new JsExpression('function(params) { return {pid:params.term,page:params.page}; }'),
                            'beforeSend'=> new JsExpression("function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ".Yii::$app->user->identity->access_token."'); }"),
                            'processResults' => new JsExpression("function (data, params) {

                                  var datas = $.map(data.items, function (obj) {
                                   obj.id = obj.visitno;
                                   obj.text =  ('('+obj.pid+') '+obj.person.fullName);
                                   return obj;
                                  });

                                  params.page = params.page || 1;

                                  return {
                                    results: datas,
                                    pagination: {
                                      more: (params.page * data._meta.perPage) < data._meta.totalCount
                                    }
                                  };

                                },
                            ")
                        ],
                    ],
              ]); ?>
        </div>
      </div>

        <div class="row">
        <div class="col-md-5">
          <?= $form->field($model, 'admit_datetime')->widget(DatePicker::classname(), [
              'language' => 'th',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              'pluginOptions' => [
                  'autoclose' => true,
                  'format' => 'yyyy-mm-dd',
                  'todayHighlight' => true
              ]
          ]); ?>
        </div>
        <div class="col-md-5">
          <?= $form->field($model, 'ward_admit')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
        <?= $form->field($model, 'age_of_admit')->textInput(['maxlength' => true]) ?>
        </div>
      </div>


      <legend><h4>รายละเอียดการคลอด </h4></legend>
      <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'ga')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'weight')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
        </div>

          <div class="col-md-3">
              <?= $form->field($model, 'apgar')->textInput() ?>
          </div>

          <div class="col-md-3">
              <?= $form->field($model, 'lr_type')->dropDownList($model->getItems('lr_type')) ?>
          </div>

      </div>

      <legend><h4>ข้อมูลการช่วยชีวิต </h4></legend>
      <div class="row">
        <div class="col-md-2">
          <?= $form->field($model, 'resuscitate')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-2">
          <?= $form->field($model, 'cpr')->inline()->radioList($model->getItems('yes/no')) ?>
        </div>
        <div class="col-md-4">
          <?= $form->field($model, 'date_of_resuscitate')->widget(DatePicker::classname(), [
              'language' => 'th',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              'pluginOptions' => [
                  'autoclose' => true,
                  'format' => 'yyyy-mm-dd',
                  'todayHighlight' => true
              ]
          ]); ?>
      </div>
      <div class="col-md-4">
          <?= $form->field($model, 'ppv')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2">
        <?= $form->field($model, 'et_tube')->inline()->radioList($model->getItems('yes/no')) ?>
      </div>
      <div class="col-md-3">
        <?= $form->field($model, 'position_et_tube')->inline()->radioList($model->getItems('position_et_tube')) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'uvc')->inline()->radioList($model->getItems('yes/no')) ?>
      </div>
      <div class="col-md-3">
        <?= $form->field($model, 'day_of_et_tube')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'day_of_o2')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

      <legend><h4>ข้อมูลการจำหน่าย </h4></legend>
        <div class="row">
        <div class="col-md-4">
          <?= $form->field($model, 'discharge_datetime')->widget(DatePicker::classname(), [
              'language' => 'th',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              'pluginOptions' => [
                  'autoclose' => true,
                  'format' => 'yyyy-mm-dd',
                  'todayHighlight' => true
              ]
          ]); ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'status_discharge')->dropDownList($model->getItems('status_discharge')) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'age_of_discharge')->textInput(['maxlength' => true]) ?>
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
</div>
