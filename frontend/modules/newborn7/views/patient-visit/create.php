<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisit */

$this->title = Yii::t('app', 'Create Patient Visit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visits'), 'url' => ['index']];
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
