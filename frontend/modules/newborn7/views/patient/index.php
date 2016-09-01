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

$this->title = 'ทะเบียนการคลอด';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.' ลงทะเบียน', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
  </div>
  <div class="panel-body patient-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table'],
        'columns' => [
            [
              'class' => 'yii\grid\SerialColumn',
              'options'=>['style'=>'width:30px']
            ],
          //'patient_id',
            // [
            //   'attribute'=>'hn',
            //   'options'=>['style'=>'width:100px']
            // ],
            // [
            //   'attribute'=>'an',
            //   'options'=>['style'=>'width:100px']
            // ],
            //'fullName',
            [
              'attribute'=>'fullName',
              'format'=>'raw',
              'value'=>function($model){
                return Html::a($model->fullName,['update','id'=>$model->patient_id],['data'=>['pjax'=>'0']]);
              }
            ],
            // [
            //   'attribute'=>'sex',
            //   'filter' => $searchModel->getItemSex(),
            //   'options'=>['style'=>'width:50px'],
            //   'value'=>function($model){
            //     return $model->getItemSexName();
            //   }
            // ],
            'hospitalName',

            // 'seq',
            //'hospcode',
            //'provinceName',
            // 'cid',
            // 'dob',

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
            'created_at:dateTime',

            [
              'class' => 'yii\grid\ActionColumn',
              'options'=>['style'=>'width:120px;'],
              'buttonOptions'=>['class'=>'btn btn-default'],
              'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {update} {delete} </div>'
           ],
        ]
    ]); ?>
    <?php Pjax::end(); ?>
  </div>
</div>
