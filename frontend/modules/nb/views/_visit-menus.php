<?php
use yii\bootstrap\Nav;

 ?>

 <?= Nav::widget([
    'items' => [
        [
            'label' => 'ประวัติ',
            'url' => ['/nb/visit/update','id'=>$personId,'visit_id'=>$visitId]
        ],
        [
            'label' => 'การคัดกรอง',
            'url' => ['/nb/visit/screening','id'=>$personId,'visit_id'=>$visitId],
        ],

        [
            'label' => 'โรคและหัตถการ',
            'url' => ['/nb/visit/disease','id'=>$personId,'visit_id'=>$visitId],
        ],
        [
            'label' => 'ข้อมูลพัฒนาการ',
            'url' => '#'
        ]
    ],
    'options' => ['class' =>'nav-pills pull-right','style'=>'margin-top:-10px;'], // set this to nav-tab to get tab-styled navigation
]);?>
