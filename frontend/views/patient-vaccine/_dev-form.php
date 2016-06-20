<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ItemAlias;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-vaccine-form">
    <br>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[1], $listData[2], $listData[3]);
            ?>

            <?= $form->field($model, 'develop')->checkboxList($result, [
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
            ])->label('แรกเกิด - 1 เดือน') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[4], $listData[5], $listData[6], $listData[7], $listData[8]);
            ?>
            <?= $form->field($model, 'develop')->checkboxList($result, [
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
            ])->label('อายุ 1 - 2 เดือน') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[9], $listData[10], $listData[11], $listData[12], $listData[13]);
            ?>
            <?= $form->field($model, 'develop')->checkboxList($result, [
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
            ])->label('อายุ 3 - 4 เดือน') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[14], $listData[15], $listData[16], $listData[17]);
            ?>
            <?= $form->field($model, 'develop')->checkboxList($result, [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-6',
                            ],
                        ]);
                    },

                'separator' => false,
                'template' => '<div class="item">{label}{input}</div>',
            ])->label('อายุ 5 - 6 เดือน') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[18], $listData[19], $listData[20], $listData[21], $listData[22]);
            ?>
            <?= $form->field($model, 'develop')->checkboxList($result, [
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
            ])->label('อายุ 7 - 8 เดือน') ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[23], $listData[24], $listData[25], $listData[26], $listData[27], $listData[28] ,$listData[29], $listData[30]);
            ?>
            <?= $form->field($model, 'develop')->checkboxList($result, [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-4',
                            ],
                        ]);
                    },

                'separator' => false,
                'template' => '<div class="item">{label}{input}</div>',
            ])->label('อายุ 9 - 10 เดือน') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            $listData = ItemAlias::getItemDev();
            $result = array($listData[31], $listData[32], $listData[33], $listData[34], $listData[35], $listData[36]);
            ?>
            <?= $form->field($model, 'develop')->checkboxList($result, [
                'item' =>
                    function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-6',
                            ],
                        ]);
                    },

                'separator' => false,
                'template' => '<div class="item">{label}{input}</div>',
            ])->label('อายุ 11 - 12 เดือน') ?>
        </div>
    </div>

</div>
<hr>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
