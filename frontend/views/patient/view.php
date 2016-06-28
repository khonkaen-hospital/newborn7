<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Patient */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa fa-plus"></i> รายละเอียดการคลอด', ['patient-sp/create', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hospcode',
            'hn',
            'an',
            'id_card',
            'first_name',
            'last_name',
            'sex',
            'birth_date',
            'at_birth',
            'ward_admit',
            'refer_receive',
            'refer_to',
            'dead',
            'exp',
            'exp_age',
            'los',
            'address:ntext',
            'province',
            'amphoe',
            'district',
            'postcode',
            'phone',
            'mobile',
            'id_card_mum',
            'first_name_mum',
            'last_name_mum',
            'hn_mum',
            'an_mum',
            'age_mum',
            'id_card_papa',
            'first_name_papa',
            'last_name_papa',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
