<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDevelop */

$this->title = $model->visit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Develops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-develop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'visit_id' => $model->visit_id, 'age_group' => $model->age_group, 'develop_no' => $model->develop_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'visit_id' => $model->visit_id, 'age_group' => $model->age_group, 'develop_no' => $model->develop_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'visit_id',
            'age_group',
            'develop_no',
            'lastupdate',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
