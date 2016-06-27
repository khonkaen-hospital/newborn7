<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DevItem */

$this->title = 'Update Dev Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dev Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dev-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
