<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DevItem */

$this->title = 'Create Dev Item';
$this->params['breadcrumbs'][] = ['label' => 'Dev Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dev-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
