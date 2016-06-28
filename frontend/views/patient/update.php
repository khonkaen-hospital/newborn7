<?php

use yii\bootstrap\Tabs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Patient */

$this->title = 'Update Patient: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-update">
    <?php echo Tabs::widget([
        'items' => [

            [
                'label' => 'ข้อมูลทั่วไปผู้ป่วย',
                'content' => $this->render('_form', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => '#',
                'active' => true

            ],
            [
                'label' => 'รายละเอียดการคลอด (ข้อมูลการมา รพ.ครั้งแรก)',
//                'url' => '#',
                'options' => [
                    'id' => 'patientSp-id',
                ],
                'clientOption' => [
                    'disable' => true
                ],
               'url' => Url::to(['patient-sp/create', 'id' => $model->id]),
            ],
        ]
    ]);
    ?>

</div>
