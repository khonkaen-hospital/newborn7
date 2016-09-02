<?php

namespace frontend\modules\nb\traits;

use frontend\modules\nb\models\query\ItemsAliasQuery;

trait ItemsAliasTrait {

  private $_itemsModel = null;

  private static function initItemsAlias()
  {
      return new ItemsAliasQuery('\frontend\modules\nb\models\ItemsAlias');
  }

  private function getItemsAlias()
  {
    if($this->_itemsModel == null)
    {
      $this->_itemsModel =  static::initItemsAlias();
    }
    return $this->_itemsModel;
  }

  public function getItems( String $key ): array
  {
    return $this->getItemsAlias()->load($key);
  }

  public function getItemsNumber( int $start = 1, int $end = 5 ): array
  {
    $rang  =  range($start,$end);
    $items = [];
    foreach ($rang as $key => $value) {
      $items[$value] = $value;
    }
    return $items;
  }

  private function getRelationField($relationName, $fieldName, $defaultValue = null){
    return isset($this->{$relationName}) ? $this->{$relationName}->{$fieldName} : $defaultValue;
  }
}
