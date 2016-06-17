<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;


/* @var $this yii\web\View */
/* @var $model common\models\PatientVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pku-form">
    <br>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>