<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\newborn7\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'patient_id',
            'hospcode',
            'prov',
            'hn',
            'an',
            // 'seq',
            // 'prename',
            // 'fname',
            // 'mname',
            // 'lname',
            // 'cid',
            // 'dob',
            // 'sex',
            // 'dead',
            // 'mother_cid',
            // 'mother_name',
            // 'mother_age',
            // 'mother_an',
            // 'father_cid',
            // 'father_name',
            // 'nation',
            // 'address',
            // 'moo',
            // 'soi',
            // 'road',
            // 'ban',
            // 'addcode',
            // 'zip',
            // 'tel',
            // 'mobile',
            // 'moi_checked',
            // 'serviced',
            // 'lr_type',
            // 'high',
            // 'weight',
            // 'ga',
            // 'apgar',
            // 'remark:ntext',
            // 'inp_id',
            // 'lastupdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
