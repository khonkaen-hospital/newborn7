<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use kartik\select2\Select2;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'ข้อมูลการคัดกรอง';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visit_id, 'url' => ['view', 'id' => $model->visit_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>
<?=$this->render('/_mainmenu',[
    'id'=>$id
])?>

<div class="xpanel-tab">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div>
<div class="xpanel-body patient-visit-create">

    <?php $form = ActiveForm::begin(); ?>


    <fieldset>
    <legend><h3>โรคและหัตถการ</h3></legend>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'disease')->widget(Select2::className(),[

          'maintainOrder' => true,
          'toggleAllSettings' => [
              'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
              'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
              'selectOptions' => ['class' => 'text-success'],
              'unselectOptions' => ['class' => 'text-danger'],
          ],
          'options' => ['placeholder' => 'กรอก disease..', 'multiple' => true],
          'pluginOptions' => [
              'tags' => true,
              'maximumInputLength' => 10
          ],
        ]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'complication')->widget(Select2::className(),[

          'maintainOrder' => true,
          'toggleAllSettings' => [
              'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
              'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
              'selectOptions' => ['class' => 'text-success'],
              'unselectOptions' => ['class' => 'text-danger'],
          ],
          'options' => ['placeholder' => 'กรอก complication..', 'multiple' => true],
          'pluginOptions' => [
              'tags' => true,
              'maximumInputLength' => 10
          ],
        ]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'procedure_code')->widget(Select2::className(),[

          'maintainOrder' => true,
          'toggleAllSettings' => [
              'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
              'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
              'selectOptions' => ['class' => 'text-success'],
              'unselectOptions' => ['class' => 'text-danger'],
          ],
          'options' => ['placeholder' => 'กรอก Procedure..', 'multiple' => true],
          'pluginOptions' => [
              'tags' => true,
              'maximumInputLength' => 10
          ],
        ]) ?>
      </div>
    </div>
    </fieldset>

    <?php ActiveForm::end(); ?>

</div>
</div>
