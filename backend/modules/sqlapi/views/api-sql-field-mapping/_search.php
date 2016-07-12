<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\sqlapi\models\ApiSqlFieldMappingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-sql-field-mapping-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'field_name') ?>

    <?= $form->field($model, 'group') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'sql') ?>

    <?php // echo $form->field($model, 'table') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'params') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'description') ?>

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
