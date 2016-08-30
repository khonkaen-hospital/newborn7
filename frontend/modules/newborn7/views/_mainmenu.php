<?php
use yii\bootstrap\Nav;

$regisActive = (Yii::$app->controller->getRoute() == 'newborn7/patient/update' || Yii::$app->controller->getRoute() == 'newborn7/patient/create') ? true:false;
$visitActive = in_array(Yii::$app->controller->getRoute(),[
  'newborn7/patient-visit/index',
  'newborn7/patient-visit/create',
  'newborn7/patient-visit/update',
  'newborn7/patient-visit/screening',
  'newborn7/patient-visit/disease',
  'newborn7/patient-visit-develop/create'
]);
echo Nav::widget([
    'items' => [
        [
            'label' => 'ประวัติผู้ป่วย',
            'url' => ['/newborn7/patient/update','id'=>$id]
        ],
        [
            'label' => 'ข้อมูลการคลอด',
            'url' => ['/newborn7/patient/newborn','id'=>$id],
        ],
        [
            'label' => 'ประวัติบิดา-มารดา',
            'url' => ['/newborn7/patient/parent-history','id'=>$id],
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
