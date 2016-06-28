<?php

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
                'content' => $this->render('_vaccine-form', ['model' => $model]),
                'options' => ['id' => 'vaccine-id'],
                //'url' => Url::to(['create', 'id' => $model->id]),
                'url' => '#',
                'active' => true

            ],
            [
                'label' => 'พัฒนาการเทียบเท่าอายุ',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => ''],
                //'url' => Url::to(['develop', 'id' => $model->id]),
                'url' => '#'
            ],
        ]
    ]);
    ?>
</div>
