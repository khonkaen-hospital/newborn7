<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\nb\models\Person */

$this->title = 'ลงทะเบียนทารกแรกเกิด';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนทารกแรกเกิด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
