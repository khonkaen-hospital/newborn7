<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApiSqlFieldMapping */

$this->title = 'Assign Field';
$this->params['breadcrumbs'][] = ['label' => 'Api Sql Field Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-sql-field-mapping-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
            Tables
          </th>
          <!-- <th>
            Columns Name
          </th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tables as $key => $table): ?>
          <tr>
            <td>
              <?=ucfirst($table->fullName);?>
            </td>

          </tr>
        <?php endforeach; ?>
      </tbody>
        </table>
</div>
