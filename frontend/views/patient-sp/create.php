<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\PatientSp */

$this->title = 'Create Patient Sp';
$this->params['breadcrumbs'][] = ['label' => 'Patient Sps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-sp-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo Tabs::widget([
        'items' => [

            [
                'label' => 'ข้อมูลทั่วไปผู้ป่วย',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => 'patient-id'],
                'url' => Url::to(['patient/create', 'patient_id' => $model->id]),


            ],
            [
                'label' => 'รายละเอียดการคลอด (ข้อมูลการมา รพ.ครั้งแรก)',
                'content' => $this->render('_form', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'patientSp-id'],
                'url' => Url::to(['create', 'id' => $model->id]),
                'active' => true
            ],
        ]
    ]);
    ?>

</div>
