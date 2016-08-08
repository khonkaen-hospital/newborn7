<?php

namespace frontend\modules\newborn7\models;

/**
 * This is the ActiveQuery class for [[Address]].
 *
 * @see Address
 */
class AddressQuery extends \yii\db\ActiveQuery
{
    public $type;

    public function prepare($builder)
    {
        if($this->type == Changwat::TYPE){
          $this->andWhere('SUBSTRING(code,-4) = "0000"');
        }elseif($this->type == Amphoe::TYPE){
          $this->andWhere('SUBSTRING(code,-4) != "0000" AND SUBSTRING(code,-2) = "00"');
        }
        elseif($this->type == Tambon::TYPE){
          $this->andWhere('substring(code,-4) != "0000" AND substring(code,-2) != "00"');
        }
        return parent::prepare($builder);
    }

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Address[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Address|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function getAmphoeByChangwatID($changwatID){
      return $this->andWhere('SUBSTRING(code,1,2)=:id',[
        ':id'=>$changwatID
      ])
      ->select(['abbr name','code id'])
      ->asArray();
    }

    public function getTambonByAmphoeID($amphoeID){
      return $this->andWhere('SUBSTRING(code,1,4)=:id',[
        ':id'=>$amphoeID
      ])
      ->select(['abbr name','code id'])
      ->asArray();
    }

    public function loadInit($id){
      return $this->andWhere('code=:id',[
        ':id'=>$id
      ])
      ->select(['abbr'])
      ->indexBy('code');
    }
}
