<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>

<fieldset style="margin-top:30px;">
  <legend>
    <h4 class="clearfix">ROP Screening <?= Html::a('+ เพิ่ม',['/newborn7/visit-screening/create','id'=>$id,'visit_id'=>$model->visit_id,'type'=>'rop'],[
    'class'=>'btn-modal btn btn-default pull-right btn-sm',
    'data'=>['type'=>'rop']
    ]);?>
    </h4>
</legend>

<?php Pjax::begin([
  'id'=>'pjax-rop'
]); ?>
<?= GridView::widget([
        'id'=>'grid-rop',
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'check_date',
              'format'=>'dateTime',
              'options'=>['style'=>'width:150px;']
            ],

            'rop_left',
            'rop_right',
            [
              'class' => 'yii\grid\ActionColumn',
              'controller'=>'visit-screening',
              'template'=>'{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>


</fieldset>