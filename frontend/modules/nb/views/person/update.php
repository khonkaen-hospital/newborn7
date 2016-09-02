<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */

$this->title = 'แก้ไขทะเบียนทารกแรกเกิด';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนทารกแรกเกิด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="person-update">

    <!-- <h4><?= Html::encode($this->title) ?></h4> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
