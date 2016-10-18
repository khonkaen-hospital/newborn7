<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Visit */

$this->title = 'Create Visit';
$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_menus',[
    'id' => $person->newborn_id
])?>

<div class="xpanel-tab visit-index">

  <div class="xpanel-heading">
    <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> '.' ', ['visit/index','id'=>$person->newborn_id]) ?>
      <span class="xpanel-title">
        ลงทะเบียนตรวจ
      </span>

  </div>
  <div class="panel-body visit-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
