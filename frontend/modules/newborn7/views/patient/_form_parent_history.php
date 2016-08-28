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
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'ประวัติบิดามารดา';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการคลอด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getFullname(), 'url' => ['update', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = $this->title;


?>

<?= $this->render('/_mainmenu',[
  'id' => $id
])?>
<div class="xpanel-tab">
  <!-- <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div> -->
  <div class="xpanel-body patient-update">

    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
        <legend><h4>ประวัติมารดา</h4></legend>
    <div class="row">
      <div class="col-md-2">
          <?= $form->field($model, 'mother_title')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-3">
          <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-3">
          <?= $form->field($model, 'mother_surname')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-4">
          <?= $form->field($model, 'mother_cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2">
        <?= $form->field($model, 'mother_age')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-3">
            <?= $form->field($model, 'mother_hn')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-3">
          <?= $form->field($model, 'mother_an')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-1">
            <?= $form->field($model, 'mother_g')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-1">
          <?= $form->field($model, 'mother_p')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'mother_no_of_anc')->textInput(['maxlength' => true]) ?>
      </div>
   </div>

    <div class="row">
       <div class="col-md-2">
         <?= $form->field($model, 'mother_vdrl')->radioList($model->getItems('positive/negative')) ?>
       </div>
       <div class="col-md-2">
       <?= $form->field($model, 'mother_hbsag')->radioList($model->getItems('positive/negative')) ?>
       </div>
       <div class="col-md-2">
         <?= $form->field($model, 'mother_anti_hiv')->radioList($model->getItems('yes/no')) ?>
       </div>
       <div class="col-md-2">
         <?= $form->field($model, 'mother_fever')->radioList($model->getItems('yes/no')) ?>
       </div>
       <div class="col-md-3">
         <?= $form->field($model, 'mother_bloody_show')->radioList($model->getItems('yes/no')) ?>
       </div>

    </div>

   <div class="row">
     <div class="col-md-2">
      <?= $form->field($model, 'mother_water_break')->inline()->radioList($model->getItems('yes/no')) ?>
     </div>
     <div class="col-md-2">
      <?= $form->field($model, 'mother_day_of_water_break')->textInput(['maxlength' => true]) ?>
     </div>
   </div>

   <div class="row">
     <div class="col-md-2">
      <?= $form->field($model, 'mother_drug_before_born')->inline()->radioList($model->getItems('yes/no')) ?>
     </div>
     <div class="col-md-5">
      <?= $form->field($model, 'mother_drug_name_before_born')->textInput(['maxlength' => true]) ?>
     </div>
   </div>

   <div class="row">
     <div class="col-md-2">
       <?= $form->field($model, 'mother_congenital_disease')->inline()->radioList($model->getItems('yes/no')) ?>
     </div>
     <div class="col-md-5">
      <?= $form->field($model, 'mother_congenital_disease_name')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-md-5">
      <?= $form->field($model, 'mother_drug')->textInput(['maxlength' => true]) ?>
     </div>
   </div>



   <div class="row">
     <div class="col-md-2">
       <?= $form->field($model, 'mother_antibiotic')->inline()->radioList($model->getItems('yes/no')) ?>
     </div>
     <div class="col-md-8">
       <?= $form->field($model, 'mother_antibiotic_name')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-md-2">
       <?= $form->field($model, 'mother_day_of_antibiotic')->textInput(['maxlength' => true]) ?>
     </div>
   </div>

   <div class="row">
     <div class="col-md-6">
       <?= $form->field($model, 'mother_amniotic_fluid_type')->inline()->radioList($model->getItems('amniotic_fluid_type')) ?>
     </div>
   </div>

   <div class="row">
     <div class="col-md-2">
       <?= $form->field($model, 'mother_problem')->inline()->radioList($model->getItems('yes/no')) ?>
     </div>
     <div class="col-md-10">
      <?= $form->field($model, 'mother_problem_desc')->textInput(['maxlength' => true]) ?>
     </div>
   </div>

   </fieldset>

    <fieldset>
        <legend><h4>ประวัติบิดา</h4></legend>
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'father_cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9']) ?>
            </div>
            <div class="col-md-3 col-xs-12">
                <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
   </fieldset>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
