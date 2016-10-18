<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>

<fieldset style="margin-top:30px;">
  <legend>
    <h4 class="clearfix">IVH Screening <?= Html::a('  <i class="glyphicon glyphicon-plus"></i> เพิ่ม',['/nb/visit-screening/create','id'=>$id,'visit_id'=>$model->visit_id,'type'=>'ivh'],[
    'class'=>'btn-modal btn btn-success pull-right btn-sm ',
    'data'=>['type'=>'ivh']
    ]);?>
    </h4>
</legend>

<?php Pjax::begin([
  'id'=>'pjax-ivh'
]); ?>
<?= GridView::widget([
        'id'=>'grid-ivh',
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'check_date',
              'format'=>'dateTime',
              'options'=>['style'=>'width:150px;']
            ],
            'ivh',
            [
              'class' => 'yii\grid\ActionColumn',
              'controller'=>'visit-screening',
              'template'=>'{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>


</fieldset>
