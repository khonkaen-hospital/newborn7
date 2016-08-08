<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\modules\newborn7\models\Address;
use frontend\modules\newborn7\models\Changwat;
use frontend\modules\newborn7\models\Amphoe;
use frontend\modules\newborn7\models\Tambon;


// foreach ($changwat as $key => $value) {
//  echo "$value->code $value->name " . get_class($value) . "<br />";
// }

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create Patient'), ['create'], ['class' => 'btn btn-primary pull-right']) ?>
  </div>
  <div class="panel-body patient-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          //'patient_id',
            'hn',
            'fullName',
            'hospitalName',
            //'an',
            // 'seq',
            //'hospcode',
            //'provinceName',
            // 'cid',
            // 'dob',
            // 'sex',
            // 'dead',
            // 'mother_cid',
            // 'mother_name',
            // 'mother_age',
            // 'mother_an',
            // 'father_cid',
            // 'father_name',
            // 'nation',
            // 'address',
            // 'moo',
            // 'soi',
            // 'road',
            // 'ban',
            // 'addcode',
            // 'zip',
            // 'tel',
            // 'mobile',
            // 'moi_checked',
            // 'serviced',
            // 'lr_type',
            // 'high',
            // 'weight',
            // 'ga',
            // 'apgar',
            // 'remark:ntext',
            // 'inp_id',
            // 'lastupdate',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{visit} {view} {update} {delete}',
                // 'buttons' => [
                //     'visit' => function ($url, $model, $key) {
                //         return Html::a('<i class=""></i> ส่งตรวจ', ['patient-visit/create', 'id' => $model->patient_id], ['class' => 'btn btn-xs btn-default']);
                //     },
                //
                //     'view' => function ($url, $model, $key) {
                //         return Html::a('<i class=""></i> ประวัติ', ['patient/view', 'id' => $model->patient_id], ['class' => 'btn btn-xs btn-primary']);
                //     },
                //
                //     'update' => function ($url, $model, $key) {
                //         return Html::a('<i class=""></i> แก้ไข', ['patient/update', 'id' => $model->patient_id], ['class' => 'btn btn-xs btn-warning']);
                //     },
                //     'delete' => function ($url, $model, $key) {
                //         return Html::a('<i class=""></i> ลบ', ['patient/delete', 'id' => $model->patient_id], ['class' => 'btn btn-xs btn-danger', 'data-method' => 'post', 'data-pjax' => '0']);
                //     },
                // ]
            ],
        ]
    ]); ?>
    <?php Pjax::end(); ?>
  </div>
</div>
