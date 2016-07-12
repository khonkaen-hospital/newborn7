<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApiSqlFieldMapping */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-sql-field-mapping-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6">

      </div>
      <div class="col-md-6">

      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div>
          <?= $form->field($model, 'table')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'field_name')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'type')->checkBoxList([1,2,3,4]) ?>

        </div>
      </div>

      <div class="col-md-6">
        <?= $form->field($model, 'sql')->textarea(['rows' => 11]) ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => 2]) ?>
        <h4>Parameter</h4>
        <?php foreach ([1,2] as $key => $value) :?>
          <div class="row">
            <div class="col-sm-6">
              <?= $form->field($model, 'key[]')->textInput(['maxlength' => true])->label('Key') ?>
            </div>
            <div class="col-sm-6">
              <?= $form->field($model, 'value[]')->textInput(['maxlength' => true])->label('Value') ?>
            </div>
          </div>
        <?php endforeach;?>
      </div>
    </div>


    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [ 'style' => 'min-width:150px;', 'class' => 'btn btn-primary btn-lg']) ?>
        <?= Html::button('Run..->', [ 'style' => 'min-width:150px;', 'class' => 'btn btn-default btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
