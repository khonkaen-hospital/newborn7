<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'an') ?>

    <?= $form->field($model, 'id_card') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'at_birth') ?>

    <?php // echo $form->field($model, 'ward_admit') ?>

    <?php // echo $form->field($model, 'refer_receive') ?>

    <?php // echo $form->field($model, 'refer_to') ?>

    <?php // echo $form->field($model, 'dead') ?>

    <?php // echo $form->field($model, 'exp') ?>

    <?php // echo $form->field($model, 'exp_age') ?>

    <?php // echo $form->field($model, 'los') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'amphoe') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'id_card_mum') ?>

    <?php // echo $form->field($model, 'first_name_mum') ?>

    <?php // echo $form->field($model, 'last_name_mum') ?>

    <?php // echo $form->field($model, 'hn_mum') ?>

    <?php // echo $form->field($model, 'an_mum') ?>

    <?php // echo $form->field($model, 'age_mum') ?>

    <?php // echo $form->field($model, 'id_card_papa') ?>

    <?php // echo $form->field($model, 'first_name_papa') ?>

    <?php // echo $form->field($model, 'last_name_papa') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
