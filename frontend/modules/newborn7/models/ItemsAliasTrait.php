<?php

namespace frontend\modules\newborn7\models;

use frontend\modules\newborn7\models\ItemsAliasQuery;

trait ItemsAliasTrait {

  public static function findItemsAlias()
  {
      return new ItemsAliasQuery('\frontend\modules\newborn7\models\ItemsAlias');
  }

  public function getItems($key){
      return static::findItemsAlias()->load($key);
  }
}
