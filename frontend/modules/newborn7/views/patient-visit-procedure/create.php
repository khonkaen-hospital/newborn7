<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Tabs;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitProcedure */

$this->title = Yii::t('app', 'Create Patient Visit Procedure');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Procedures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-procedure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php echo Tabs::widget([
        'items' => [
            [
                'label' => 'Diag',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => 'diag-id'],
                'url' => Url::to(['patient-visit-diag/create', 'id' => $model->visit_id, 'id' => $id]),
            ],
            [
                'label' => 'Vaccine',
                'content' => '',
                'headerOptions' => [],
                'options' => ['id' => 'vaccine-id'],
                'url' => Url::to(['patient-visit-vaccine/create', 'id' => $model->visit_id, 'id' => $id])

            ],
            [
                'label' => 'Development',
                'content' => '',
                'options' => ['id' => 'development-id'],
                'headerOptions' => [],
                'url' => Url::to(['patient-visit-development/create', 'id' => $model->visit_id, 'id' => $id])
            ],
            [
                'label' => 'Procedure',
                'content' => $this->render('_form',['model' => $model]),
                'options' => ['id' => 'procedure-id'],
                'headerOptions' => [],
                'url' => '#',
                'active' => true
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
