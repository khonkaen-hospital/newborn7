<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\Patient */

$this->title =  'ลงทะเบียนผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
  </div>
<div class="xpanel-body patient-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
