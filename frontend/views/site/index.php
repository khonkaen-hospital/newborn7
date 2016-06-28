<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title =  Yii::$app->params['app.brandLabel'];

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$this->title?></h1>

        <p class="lead"><?=Yii::$app->params['app.subtitle']?></p>

        <p>
          <?=Html::a('บันทึก KPI New Born',['patient/index'],['class'=>'btn btn-lg btn-default'])?>
        </p>
    </div>

</div>
