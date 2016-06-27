<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DevItemGroup */

$this->title = 'Update Dev Item Group: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dev Item Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dev-item-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
