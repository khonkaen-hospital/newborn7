<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PatientVaccineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Vaccines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-vaccine-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patient Vaccine', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'current_weight',
            'hc',
            'length',
            'af',
            // 'milk',
            // 'vaccine',
            // 'vaccine_other',
            // 'eye',
            // 'eye_other',
            // 'ear',
            // 'ear_other',
            // 'ult_brain',
            // 'ref',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
