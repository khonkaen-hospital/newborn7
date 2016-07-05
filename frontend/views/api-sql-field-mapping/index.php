<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApiSqlFieldMappingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Api Sql Field Mappings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-sql-field-mapping-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Api Sql Field Mapping', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'field_name',
            'group',
            'type',
            //'sql:ntext',
            // 'comment:ntext',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
