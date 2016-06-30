<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientVisitClinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Patient Visit Clinics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-clinic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Patient Visit Clinic'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'visit_id',
            'hospcode',
            'hn',
            'seq',
            'ga',
            // 'birth_weight',
            // 'caregivers',
            // 'current_weight',
            // 'hc',
            // 'length',
            // 'af',
            // 'clinic_date',
            // 'milk',
            // 'milk_other',
            // 'vaccine',
            // 'vaccine_other',
            // 'eye',
            // 'eye_other',
            // 'ear',
            // 'ear_other',
            // 'ult_brain',
            // 'ult_brain_result',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
