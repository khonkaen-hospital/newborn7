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
          <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        </div>
      </div>

      <div class="col-md-6">
        <?= $form->field($model, 'sql')->textarea(['rows' => 11]) ?>
        <?= $form->field($model, 'comment')->textarea(['rows' => 2]) ?>

      </div>
    </div>


    <div class="form-group text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [ 'style' => 'min-width:150px;', 'class' => 'btn btn-primary btn-lg']) ?>
        <?= Html::button('Run..->', [ 'style' => 'min-width:150px;', 'class' => 'btn btn-default btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
