<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;
use kartik\select2\Select2;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'โรคและหัตถการ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการตรวจ ('.$person->fullName.')', 'url' => ['visit/index','id'=>$person->newborn_id]];
$this->params['breadcrumbs'][] = $this->title;

?>
  <?php $form = ActiveForm::begin(); ?>

<?=$this->render('/_menus',[
    'id'=>$id
])?>

<div class="xpanel-tab">
  <?= $this->render('_visit-menus',[
      'personId' => $person->newborn_id,
      'visitId' => $model->visit_id,
      'model' => $model,
      'person' => $person
  ])?>
<div class="xpanel-body patient-visit-create">
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

</div>
</div>
<br>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '<i class=""></i> บันทึก' : 'บันทึก', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') .' pull-right']) ?>
</div>
<?php ActiveForm::end(); ?>
