<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ทะเบียนผู้ป่วย');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '. 'Create Patient Visit', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
  </div>
  <div class="panel-body patient-visit-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>[
          'class'=>'table'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'visit_id',
            'seq',
            'hospcode',
            'hn',
            'date',
            // 'clinic',
            // 'pttype',
            // 'age',
            // 'age_type',
            // 'result',
            // 'referin',
            // 'referout',
            // 'head_size',
            // 'height',
            // 'weight',
            // 'waist',
            // 'bp_max',
            // 'bp_min',
            // 'inp_id',
            // 'lastupdate',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{clinic} {view} {update} {delete}',
                'buttons' => [
                    'clinic' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> คลินิก', ['patient-visit-diag/create', 'id' => $model->visit_id], ['class' => 'btn btn-xs btn-success']);
                    },

                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> รายละเอียด', ['patient-visit/view', 'id' => $model->visit_id], ['class' => 'btn btn-xs btn-primary']);
                    },

                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> แก้ไข', ['patient-visit/update', 'id' => $model->visit_id], ['class' => 'btn btn-xs btn-warning']);
                    },

                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> ลบ', ['patient-visit/delete', 'id' => $model->visit_id], ['class' => 'btn btn-xs btn-danger', 'data-method' => 'post', 'data-pjax' => '0']);
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
