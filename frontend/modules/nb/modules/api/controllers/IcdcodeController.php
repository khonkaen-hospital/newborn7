<?php

namespace frontend\modules\nb\modules\api\controllers;

use Yii;

class IcdcodeController extends \yii\rest\ActiveController
{
    public $modelClass = 'frontend\modules\nb\modules\api\models\Icdcode';

    public $serializer = [
       'class' => 'yii\rest\Serializer',
       'collectionEnvelope' => 'items',
    ];

    public function actions() {
        $actions = [
            'search' => [
                'class'       => 'frontend\modules\nb\modules\api\actions\SearchAction',
                'modelClass'  => $this->modelClass,
                'params'      => Yii::$app->request->get(),
                'likeField' => ['code','description'],
                'queryCondition' => function($query, $q){
                  $query->andWhere(' code LIKE :q OR description LIKE :q ', [
                    ':q' => '%'.$q.'%',
                  ]);
                }
            ],
        ];

        return array_merge(parent::actions(), $actions);
    }

    public function verbs() {
        $verbs = [
            'search'   => ['GET']
        ];
        return array_merge(parent::verbs(), $verbs);
    }
}
