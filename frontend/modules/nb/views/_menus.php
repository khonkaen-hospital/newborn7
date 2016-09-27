<?php
use yii\bootstrap\Nav;

$regisActive = (Yii::$app->controller->getRoute() == 'newborn7/patient/update' || Yii::$app->controller->getRoute() == 'newborn7/patient/create') ? true:false;
$visitActive = in_array(Yii::$app->controller->getRoute(),[
  'nb/patient-visit/index',
  'nb/patient-visit/create',
  'nb/patient-visit/update',
  'nb/patient-visit/screening',
  'nb/patient-visit/disease',
  'nb/patient-visit-develop/create'
]);
echo Nav::widget([
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-baby-formula"></i> ประวัติผู้ป่วย',
            'url' => ['/nb/person/update','id'=>$id]
        ],
        [
            'label' => '<i class="glyphicon glyphicon-link"></i> ข้อมูลการคลอด',
            'url' => ['/nb/person/newborn-baby','id'=>$id],
        ],
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> ประวัติมารดา',
            'url' => ['/nb/person/parent','id'=>$id],
        ],
        [
            'label' => 'ข้อมูลการตรวจ',
            'url' => ['/newborn7/patient-visit/index','id'=>$id],
            'active'=>$visitActive

        ]

    ],
    'options' => ['class' =>'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);
?>
