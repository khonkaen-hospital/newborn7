<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลการตรวจ';
$this->params['breadcrumbs'][] = ['label' => 'ทะเบียนการคลอด', 'url' => ['/newborn7/patient/index']];
$this->params['breadcrumbs'][] = ['label' => $patient->getFullname(), 'url' => ['/newborn7/patient/update', 'id' => $patient->patient_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('/_mainmenu',[
  'id' => $id
])?>
<div class="xpanel-tab">

  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '. 'เพิ่มการคัดกรอง', ['create','id'=>$id], ['class' => 'btn btn-primary pull-right']) ?>
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
            'date:dateTime',
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
                'options'=>['style'=>'width:400px;'],
                'template' => '<div class="btn-group btn-group-sm text-center" role="group">{clinic} {vaccine} {icd10} {development} {delete}</div>',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'buttons' => [
                    'clinic' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> คัดกรอง', ['/newborn7/patient-visit/update', 'id'=>$model->patient_id,'visit_id' => $model->visit_id], ['class' => 'btn  btn-default','data'=>['pjax'=>'0']]);
                    },
                    'vaccine' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> การให้วัคซีน', ['patient-visit/view', 'id' => $model->visit_id], ['class' => 'btn  btn-default']);
                    },
                    'icd10' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> โรคและหัตถการ', ['patient-visit/view', 'id' => $model->visit_id], ['class' => 'btn  btn-default']);
                    },
                    'development' => function ($url, $model, $key) {
                        return Html::a('<i class=""></i> ข้อมูลพัฒนาการ', ['patient-visit/update', 'id' => $model->visit_id], ['class' => 'btn  btn-default']);
                    }
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
