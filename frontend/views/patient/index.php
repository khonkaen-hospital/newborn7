<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PatientSearch */
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

            'id',
            'hospcode',
            'hn',
            'an',
            'id_card',
            // 'first_name',
            // 'last_name',
            // 'sex',
            // 'birth_date',
            // 'at_birth',
            // 'ward_admit',
            // 'refer_receive',
            // 'refer_to',
            // 'dead',
            // 'exp',
            // 'exp_age',
            // 'los',
            // 'address:ntext',
            // 'province',
            // 'amphoe',
            // 'district',
            // 'postcode',
            // 'phone',
            // 'mobile',
            // 'id_card_mum',
            // 'first_name_mum',
            // 'last_name_mum',
            // 'hn_mum',
            // 'an_mum',
            // 'age_mum',
            // 'id_card_papa',
            // 'first_name_papa',
            // 'last_name_papa',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{visit} {view} {update} {delete}',
                'buttons'=>[
                    'visit' => function($url,$model,$key){
                        return Html::a('<i class=""></i> >>Visit',['screening-of-newbron/pku-screening', 'id' => $model->id], ['class' => 'btn btn-xs btn-success']);
                    }
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
