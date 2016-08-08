<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use yii\widgets\MaskedInput;
use common\models\Profile;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use frontend\modules\newborn7\models\Changwat;
use frontend\modules\newborn7\models\Amphoe;
/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('app', 'แก้ไขประวัติ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient_id, 'url' => ['view', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_menus',[
  'id' => $id
])?>
<div class="xpanel-tab">
  <!-- <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div> -->
  <div class="xpanel-body patient-update">

    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <legend><h4>รายละเอียดการคลอด (ข้อมูลการมา รพ.ครั้งแรก)</h4></legend>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'moi_checked')->dropDownList(['1' => 'คลอด รพ.', '2' => 'รับ Refer']) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'serviced')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'lr_type')->dropDownList(['NL' => 'NL', 'C/S' => 'C/S', 'Forcep' => 'Forcep']) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'high')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'weight')->textInput() ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'ga')->textInput() ?>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= $form->field($model, 'apgar')->textInput() ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?= $form->field($model, 'remark')->textarea(['maxlength' => true]) ?>
            </div>
        </div>
    </fieldset>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
