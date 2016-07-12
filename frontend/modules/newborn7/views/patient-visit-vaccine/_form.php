<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\newborn7\models\ItemAlias;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitVaccine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-vaccine-form">
    <br/>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'visit_id')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'vaccine_no')->checkboxList(ItemAlias::getItemVaccine(), [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-3',
                            ],
                        ]);
                    },

                'separator' => false,
                'template' => '<div class="item">{label}{input}</div>',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'vaccine_other')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <hr>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
