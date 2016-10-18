<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use kartik\select2\Select2;
use yii\bootstrap\Modal;



/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-form">

<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model)?>
<fieldset>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'language' => 'th',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                      'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
      <div class="col-md-4">
          <?= $form->field($model, 'foster_name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-2">
          <?= $form->field($model, 'ga')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-2">
          <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-1">
          <?= $form->field($model, 'hc')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-1">
          <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
      </div>

    </div>
    <div class="row">
      <div class="col-md-2">
          <?= $form->field($model, 'af')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-2">
          <?= $form->field($model, 'x',[
            'template' => '{label} <div class="input-group">
      <div class="input-group-addon">x</div>
      {input}
      {error} {hint}
    </div>'
          ])->textInput(['maxlength' => true])->label('&nbsp;') ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
          <?= $form->field($model, 'milk')->radioList($model->getItems('yes/no')) ?>
      </div>
      <div class="col-md-4">
          <?= $form->field($model, 'milk_milk_powder')->radioList($model->getItems('yes/no')) ?>
      </div>
      <div class="col-md-4">
          <?= $form->field($model, 'milk_powder')->radioList($model->getItems('yes/no')) ?>
      </div>
    </div>
</fieldset>
<br>
<fieldset>
<legend><h3>การให้วัคซีน</h3></legend>
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'vaccine')->widget(Select2::className(),[
      'data' => $model->getItems('vaccine'),
      'maintainOrder' => true,
      'toggleAllSettings' => [
          'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
          'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
          'selectOptions' => ['class' => 'text-success'],
          'unselectOptions' => ['class' => 'text-danger'],
      ],
      'options' => ['placeholder' => 'เลือกวัคซีน..', 'multiple' => true],
      'pluginOptions' => [
          'tags' => true,
          'maximumInputLength' => 10
      ],
    ]) ?>
  </div>
  <div class="col-md-6">
      <?= $form->field($model, 'vaccine_other')->textInput(['maxlength' => true]) ?>
  </div>
</div>
</fieldset>
<br>
<fieldset>
  <legend><h4>สรุปผลตรวจ</h4></legend>
  <?= $form->field($model, 'summary')->textarea(['rows' => 5]) ?>
</fieldset>





<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '<i class=""></i> บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
