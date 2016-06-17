<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PatientVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patient Visit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'visit_id',
            'hospcode_seq',
            'hospcode_hn',
            'visit_date',
            // 'tsh_pku',
            // 'tsh_pku_date',
            // 'tsh_pku_result',
            // 'oae',
            // 'oae_date',
            // 'oae_right',
            // 'oae_left',
            // 'oae_result',
            // 'oae_abr',
            // 'ivh_ult_brain',
            // 'ivh_date',
            // 'ivh_result',
            // 'rop',
            // 'rop_date',
            // 'rop_result',
            // 'rop_hosp_appointment',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'update_by',
            // 'appointment_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
