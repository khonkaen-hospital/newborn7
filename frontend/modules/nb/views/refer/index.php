<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\nb\models\ReferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Refers';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <i class="fa fa-child"></i> <?= Html::encode($this->title) ?>
      </span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.' ลงทะเบียน', ['create'], ['class' => 'btn btn-success pull-right']) ?>
  </div>

  <div class="panel-body refer-index">
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'hospcode',
            'patient_id',
            'visit_id',
            'refer_to',
            // 'status',
            // 'irefer_id',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'refer_hospital_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
