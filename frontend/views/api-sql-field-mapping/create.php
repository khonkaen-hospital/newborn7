<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApiSqlFieldMapping */

$this->title = 'Create Api Sql Field Mapping';
$this->params['breadcrumbs'][] = ['label' => 'Api Sql Field Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-sql-field-mapping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
