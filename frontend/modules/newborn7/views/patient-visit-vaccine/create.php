<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitVaccine */

$this->title = Yii::t('app', 'Create Patient Visit Vaccine');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Vaccines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-vaccine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php echo Tabs::widget([
        'items' => [
            [
                'label' => 'Diag',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => 'diag-id'],
                'url' => Url::to(['patient-visit-diag/create', 'id' => $model->visit_id, 'id' => $id])
            ],
            [
                'label' => 'Vaccine',
                'content' => $this->render('_form',['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'vaccine-id'],
                'url' => '#',
                'active' => true

            ],
            [
                'label' => 'Development',
                'content' => '',
                'options' => ['id' => 'development-id'],
                'headerOptions' => [],
                'url' => Url::to(['patient-visit-develop/create', 'id' => $model->visit_id, 'id' => $id])
            ],
            [
                'label' => 'Procedure',
                'content' => '',
                'options' => ['id' => 'procedure-id'],
                'headerOptions' => [],
                'url' => Url::to(['patient-visit-procedure/create', 'id' => $model->visit_id, 'id' => $id])
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
