<?php

use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Patient */

$this->title = 'ลงทะเบียนประวัติ Newborn';
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?=$this->title;?></h1>
<br>
<div class="patient-create">
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
                'url' => '#',
                'options' => [
                    'id' => 'patientSp-id',
                ],
                'clientOption' => [
                    'disable' => true
                ],
//               'url' => Url::to(['patient-sp/create', 'id' => $model->id]),
            ],
        ]
    ]);
    ?>

</div>
