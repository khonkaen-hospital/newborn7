<?php
use yii\bootstrap\Nav;

$regisActive = (Yii::$app->controller->getRoute() == 'newborn7/patient/update' || Yii::$app->controller->getRoute() == 'newborn7/patient/create') ? true:false;
$visitActive = in_array(Yii::$app->controller->getRoute(),[
  'nb/visit/index',
  'nb/visit/create',
  'nb/visit/update',
  'nb/visit/screening',
  'nb/visit/disease',
  'nb/visit-develop/create'
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
            'label' => '<i class="glyphicon glyphicon-edit"></i>  ประวัติการตรวจ',
            'url' => ['/nb/visit/index','id'=>$id],
            'active'=>$visitActive

        ]

    ],
    'options' => ['class' =>'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);
?>
