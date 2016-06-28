<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Patient */

$this->title = 'Create Patient';
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo Tabs::widget([
        'items' => [

            [
                'label' => 'ข้อมูลทั่วไปผู้ป่วย',
                'content' => $this->render('_form', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => Url::to(['create', 'id' => $model->id]),
                'active' => true

            ],
            [
                'label' => 'รายละเอียดการคลอด (ข้อมูลการมา รพ.ครั้งแรก)',
                'options' => ['id' => 'patientSp-id'],
                'url' => Url::to(['patient-sp/create', 'id' => $model->id]),

            ],
        ]
    ]);
    ?>

</div>