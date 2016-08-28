<?php
use yii\bootstrap\Nav;

$regisActive = (Yii::$app->controller->getRoute() == 'newborn7/patient/update' || Yii::$app->controller->getRoute() == 'newborn7/patient/create') ? true:false;
echo Nav::widget([
    'items' => [
        [
            'label' => 'ข้อมูลทารกแรกเกิด',
            'url' => ['/newborn7/patient/update','id'=>$id],
            'active'=> $regisActive
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
            'label' => 'ข้อมูลการคัดกรอง',
            'url' => ['/newborn7/patient-visit/index','id'=>$id],

        ]
    ],
    'options' => ['class' =>'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);
?>
