<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDevelop */

$this->title = 'ข้อมูลพัฒนาการ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Develops'), 'url' => ['index']];
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

<?=$this->render('_form',['model' => $model])?>

</div>
</div>
