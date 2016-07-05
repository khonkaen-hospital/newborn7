<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApiSqlFieldMapping */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-sql-field-mapping-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'field_name')->textInput(['maxlength' => true]) ?>

    <div class="row">
      <div class="row">
          
      </div>
    </div>

    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'table')->dropdownList($model->getPatientItems()) ?>

    <?= $form->field($model, 'sql')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
