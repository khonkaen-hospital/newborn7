<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ItemAlias;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-vaccine-form">
    <br>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'current_weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'hc')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'af')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'milk')->checkboxList(ItemAlias::getItemMilk(), [
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
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'vaccine')->checkboxList(ItemAlias::getItemVaccine(), [
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

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'eye')->checkboxList(ItemAlias::getItemEye(), [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-2',
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
            <?= $form->field($model, 'eye_other')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'ear')->checkboxList(ItemAlias::getItemEar(), [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-2',
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
            <?= $form->field($model, 'ear_other')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">

            <?= $form->field($model, 'ult_brain')->checkboxList(ItemAlias::getItemUlt(), [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-2',
                            ],
                        ]);
                    },

                'separator' => false,
                'template' => '<div class="item">{label}{input}</div>',
            ]) ?>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
