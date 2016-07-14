<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'visit_id') ?>

    <?= $form->field($model, 'seq') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'clinic') ?>

    <?php // echo $form->field($model, 'pttype') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'age_type') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'referin') ?>

    <?php // echo $form->field($model, 'referout') ?>

    <?php // echo $form->field($model, 'head_size') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'waist') ?>

    <?php // echo $form->field($model, 'bp_max') ?>

    <?php // echo $form->field($model, 'bp_min') ?>

    <?php // echo $form->field($model, 'inp_id') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
