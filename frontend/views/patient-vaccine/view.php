<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Vaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-vaccine-view">

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
        <?= Html::a('<i class="fa fa-list"></i> ลงทะเบียนผู้ป่วย', ['patient/index'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'current_weight',
            'hc',
            'length',
            'af',
//            'milk',
//            'vaccine',
            'vaccine_other',
//            'eye',
            'eye_other',
//            'ear',
            'ear_other',
//            'ult_brain',
            'ref',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ])
    ?>

</div>
