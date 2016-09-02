<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\nb\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทะเบียนทารกแรกเกิด';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="xpanel">

  <div class="xpanel-heading">
      <span class="xpanel-title">
        <?= Html::encode($this->title) ?>
      </span>
      <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.' ลงทะเบียน', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
  </div>

  <div class="panel-body person-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'tableOptions' => ['class'=>'table'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],


                [
                  'attribute'=>'fullName',
                ],
                'cid',
                'pid',
                'hospcode',
                // 'hid',
                // 'prename',
                // 'name',
                // 'lname',
                // 'hn',
                // 'sex',
                // 'birth',
                // 'mstatus',
                // 'occupation_old',
                // 'occupation_new',
                // 'race',
                // 'nation',
                // 'religion',
                // 'education',
                // 'fstatus',
                // 'father',
                // 'mother',
                // 'couple',
                // 'vstatus',
                // 'movein',
                // 'discharge',
                // 'ddischarge',
                // 'abogroup',
                // 'rhgroup',
                // 'labor',
                // 'passport',
                // 'typearea',
                // 'd_update',
                // 'id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    </div>
</div>
