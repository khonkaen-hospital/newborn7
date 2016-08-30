<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 ?>

<fieldset style="margin-top:30px;">
  <legend>
    <h4 class="clearfix">OAE Screening <?= Html::a('+ เพิ่ม',['/newborn7/visit-screening/create','id'=>$id,'visit_id'=>$model->visit_id,'type'=>'oae'],[
    'class'=>'btn-modal btn btn-default pull-right btn-sm ',
    'data'=>['type'=>'tsh-oae']
    ]);?>
    </h4>
</legend>

<?php Pjax::begin([
  'id'=>'pjax-oae'
]); ?>
<?= GridView::widget([
        'id'=>'grid-oae',
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'check_date',
              'format'=>'dateTime',
              'options'=>['style'=>'width:150px;']
            ],

            'oae_left',
            'oae_right',
            [
              'class' => 'yii\grid\ActionColumn',
              'controller'=>'visit-screening',
              'template'=>'{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>


</fieldset>
