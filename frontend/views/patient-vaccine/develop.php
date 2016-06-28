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
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo Tabs::widget([
        'items' => [
            [
                'label' => 'Newborn Clinic',
                'options' => ['id' => 'vaccine-id'],
                'url' => Url::to(['create', 'id' => $model->id]),

            ],
            [
                'label' => 'พัฒนาการเทียบเท่าอายุ',
                'content' => $this->render('_dev-form', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => ''],
                'url' => Url::to(['develop', 'id' => $model->id]),
                'active' => true

            ],
        ]
    ]);
    ?>
</div>
