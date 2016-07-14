<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xpanel">
  <div class="xpanel-heading">
    <span class="xpanel-title"><?= Html::encode($this->title) ?></span>
    <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.'ลงทะเบียน', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
  </div>
<div class="xpanel-body patient-visit-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table'],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
