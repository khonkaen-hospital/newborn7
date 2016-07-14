<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patient Visits');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Patient Visit'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
<?php Pjax::end(); ?></div>
