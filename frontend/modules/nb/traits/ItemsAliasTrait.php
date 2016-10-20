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


  public function setStandardFormatdate($field)
  {
    if(strlen($this->{$field}) >= 10){
      return (date('Y',strtotime($this->{$field}))-543).date('-m-d',strtotime($this->{$field})).' '.date('H:i:s',strtotime($this->{$field}));
    }else{
      return (date('Y',strtotime($this->{$field}))-543).date('-m-d',strtotime($this->{$field}));
    }
  }

  public function setThaiFormatdate($field)
  {
    if(in_array($this->{$field},['0000-00-00','0000-00-00 00:00:00']) || empty($this->{$field}))
    {
      return null;
    }
    if(strlen($this->{$field}) >= 10 ){
      return date('d-m-',strtotime($this->{$field})). (date('Y',strtotime($this->{$field}))+543).' '.date('H:i:s',strtotime($this->{$field}));
    }else{
      return date('d-m-',strtotime($this->{$field})). (date('Y',strtotime($this->{$field}))+543);
    }
  }
}
