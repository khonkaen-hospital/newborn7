<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */

$this->title = Yii::t('app', 'แก้ไขประวัติ');
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการคลอด', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->getFullname(), 'url' => ['view', 'id' => $model->patient_id]];
$this->params['breadcrumbs'][] = $model->getFullname()
?>

<?= $this->render('_menus',[
  'id' => $id
])?>

<div class="xpanel-tab">
  <!-- <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div> -->

<div class="xpanel-body patient-update">

    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id
    ]) ?>
</div>
</div>
