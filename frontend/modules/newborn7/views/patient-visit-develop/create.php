<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDevelop */

$this->title = Yii::t('app', 'Create Patient Visit Develop');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Develops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-develop-create">

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
                'content' => $this->render('_form',['model' => $model]),
                'options' => ['id' => 'development-id'],
                'headerOptions' => [],
                'url' => '#',
                'active' => true
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
