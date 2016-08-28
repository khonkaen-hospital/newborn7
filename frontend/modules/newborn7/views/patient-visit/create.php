<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = 'เพิ่มการคัดกรอง';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการคลอด', 'url' => ['/newborn7/patient/index']];
$this->params['breadcrumbs'][] = ['label' => $patient->getFullname(), 'url' => ['/newborn7/patient/update', 'id' => $patient->patient_id]];
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนส่งตรวจ', 'url' => ['index','id'=>$patient->patient_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('/_mainmenu',[
    'id'=>$id
])?>
<div class="xpanel-tab">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div>
<div class="xpanel-body patient-visit-create">

    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id
    ]) ?>

</div>
</div>
