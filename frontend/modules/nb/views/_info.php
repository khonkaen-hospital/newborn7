<div class="xpanel-heading-info ">
    <small>
      <i class="glyphicon glyphicon-info-sign"></i>
      <label>วันที่: </label> <i class="text-info"><?=Yii::$app->formatter->asDate($visit->date)?></i>
      <label>ชื่อ: </label> <i class="text-info"><?=$person->fullName?></i>
      <label>อายุ: </label> <i class="text-info"><?=$visit->age?></i>
      <label>สถานพยาบาล: </label> <i class="text-info"><?=$visit->hospitalName?></i>
    </small>
</div>
