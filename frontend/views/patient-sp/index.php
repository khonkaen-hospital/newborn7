<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PatientSpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Sps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-sp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patient Sp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'patient_sp_code',
            'calve_status',
            'weigh',
            'ga',
            // 'apgar',
            // 'lr_type',
            // 'dexa',
            // 'dose_brufen',
            // 'dose_bt',
            // 'htc',
            // 'dtx',
            // 'resuscltate',
            // 'date_of_resuscltate',
            // 'time_of_resuscltate',
            // 'ppv',
            // 'cpr',
            // 'et_tube_status',
            // 'uvc',
            // 'et_tube',
            // 'o2',
            // 'pdx',
            // 'dx',
            // 'dx_other',
            // 'comp',
            // 'comp_other',
            // 'proc',
            // 'proc_other',
            // 'hospcode',
            // 'patient_id',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
