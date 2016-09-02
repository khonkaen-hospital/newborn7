<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="xpanel" id="personal-data">

  <div class="xpanel-heading-sm">
      <span class="xpanel-title">
        ข้อมูลทารกแรกเกิด
      </span>
  </div>

  <div class="panel-body person-form" >

    <div class="row">
      <div class="col-sm-2 ">
        <?= $form->field($model, 'prename')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-5 col-xs-6">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-5 col-xs-6">
        <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <?= $form->field($model, 'cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'birth')->widget(MaskedInput::className(), ['mask' => '99-99-9999'])->label($model->isNewRecord ? $model->getAttributeLabel('birth') : $model->getAttributeLabel('birth'). ' '.$model->currentAge.' ปี') ?>
      </div>
      <div class="col-sm-3">
        <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-3">
          <?= $form->field($model, 'sex')->inline()->radioList($model->getItems('sex')); ?>
      </div>
    </div>
  </div>
  </div>

  <div class="xpanel" id="parent-data">

    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ข้อมูลที่อยู่
        </span>
    </div>

    <div class="panel-body person-form">

    </div>
  </div>

  <div class="xpanel" id="parent-data">

    <div class="xpanel-heading-sm">
        <span class="xpanel-title">
          ข้อมูลบิดา-มารดา
        </span>
    </div>

    <div class="panel-body person-form">

    <?= $form->field($model, 'father')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
    <?= $form->field($model, 'mother')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>


  </div>
  </div>
  <div class="form-group pull-right">
      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['style'=>'min-width:150px;', 'class' => ' '.($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')]) ?>
  </div>

    <?php ActiveForm::end(); ?>
