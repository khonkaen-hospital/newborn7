<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\sqlapi\models\ApiSqlFieldMapping */

$this->title = 'Update Api Sql Field Mapping: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Api Sql Field Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="api-sql-field-mapping-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
