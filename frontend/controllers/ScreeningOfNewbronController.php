<?php
/**
 * Created by PhpStorm.
 * User: pil2ate
 * Date: 6/14/16 AD
 * Time: 3:46 PM
 */

namespace frontend\controllers;


use Yii;
use common\models\PatientVisit;
use common\models\PatientVisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ScreeningOfNewbronController extends controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        echo 555;
//        $searchModel = new PatientVisitSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('screening-of-newbron/index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

} 