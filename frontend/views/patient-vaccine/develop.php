<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\PatientVaccine */

$this->title = 'Newborn Clinic';
$this->params['breadcrumbs'][] = ['label' => 'Patient Vaccines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-vaccine-create">
    <?php echo Tabs::widget([
        'items' => [
            [
                'label' => 'Newborn Clinic',
                'options' => ['id' => 'vaccine-id'],
                'url' => Url::to(['update', 'id' => $model->ref]),

            ],
            [
                'label' => 'พัฒนาการเทียบเท่าอายุ',
                'content' => $this->render('_dev-form', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => ''],
                //'url' => Url::to(['develop', 'id' => $model->id]),
                'active' => true,
                'url' => '#'
            ],
        ]
    ]);
    ?>
</div>
