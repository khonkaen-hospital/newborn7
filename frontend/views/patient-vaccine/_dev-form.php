<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ItemAlias;
use yii\helpers\ArrayHelper;
use common\models\DevItem;
use common\models\DevItemGroup;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-vaccine-form">
    <br>
    <?php $form = ActiveForm::begin(); ?>
    <?php
//    echo $form->field($model, 'develop')->checkboxList(ArrayHelper::map(DevItem::find()->joinWith('devItemGroup')->all(), 'id', 'item_name'), [
//        'item' => function ($index, $label, $name, $checked, $value) {
//            return Html::checkbox($name, $checked, [
//                'value' => $value,
//                'label' => '<label for="' . $label . '">' . $label . '</label>',
//                'labelOptions' => [
//                    'class' => 'ckbox ckbox-primary col-md-4',
//                    'style' => ''
//                ],
//            ]);
//        },
//
//        'separator' => false,
//        'template' => '<div class="item">{label}{input}</div>',
//    ])->label()
    ?>
    <?php
    $arrayItemGroup = DevItemGroup::find()->all();
    foreach ($arrayItemGroup as $key => $value) {
        ?>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?php
                $arrayItem = DevItem::find()->where(['ref' => $key])->all();
                echo $form->field($model, 'dev'.$value->id)->checkboxList(ArrayHelper::map(DevItem::find()->joinWith('devItemGroup')->where(['ref' => $value->id])->all(), 'id', 'item_name'), [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        return Html::checkbox($name, $checked, [
                            'value' => $value,
                            'label' => '<label for="' . $label . '">' . $label . '</label>',
                            'labelOptions' => [
                                'class' => 'ckbox ckbox-primary col-md-4',
                                'style' => ''
                            ],
                        ]);
                    },

                    'separator' => false,
                    'template' => '<div class="item">{label}{input}</div>',
                ])->label($value->name_group)
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <hr>
            </div>
        </div>
    <?php } ?>


    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            //            echo $form->field($model, 'develop')->checkboxList(ArrayHelper::map(DevItem::find()->where(['ref' => 2])->all(), 'id', 'item_name'), [
            //                'item' =>
            //                    function ($index, $label, $name, $checked, $value) {
            //                        return Html::checkbox($name, $checked, [
            //                            'value' => $value,
            //                            'label' => '<label for="' . $label . '">' . $label . '</label>',
            //                            'labelOptions' => [
            //                                'class' => 'ckbox ckbox-primary col-md-3',
            //                            ],
            //                        ]);
            //                    },
            //
            //                'separator' => false,
            //                'template' => '<div class="item">{label}{input}</div>',
            //            ])->label('อายุ 1 - 2 เดือน')
            ?>
        </div>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
