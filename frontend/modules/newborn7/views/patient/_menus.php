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
            'label' => 'ข้อมูลการตรวจ',
            'url' => ['/newborn7/patient-visit/index','id'=>$id],

        ],
        [
            'label' => 'ข้อมูลการเสียชีวิต',
            'url' => ['/newborn7/patient/dead','id'=>$id]
        ],
    ],
    'options' => ['class' =>'nav-tabs'], // set this to nav-tab to get tab-styled navigation
]);
?>
