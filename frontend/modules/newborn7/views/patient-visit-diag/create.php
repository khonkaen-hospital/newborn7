<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\modules\newborn7\models\PatientVisitDiag */

$this->title = Yii::t('app', 'Create Patient Visit Diag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient Visit Diags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visit-diag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="screening-of-newbron">
        <?php Pjax::begin(); ?>
        <?php echo Tabs::widget([
            'items' => [
                [
                    'label' => 'Diag',
                    'content' => $this->render('_form',['model' => $model]),
                    'headerOptions' => [],
                    'options' => ['id' => 'diag-id'],
                    'url' => '#',
                    'active' => true
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

</div>
