<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DevItemGroup */

$this->title = 'Create Dev Item Group';
$this->params['breadcrumbs'][] = ['label' => 'Dev Item Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dev-item-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
