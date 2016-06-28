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
        $searchModel = new PatientVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPkuScreening($id = null)
    {
        $model = new PatientVisit();

        if ($model->load(Yii::$app->request->post())) {
            $model->patient_id = $id;
            if ($model->save()) {
                return $this->redirect(['oae-screening', 'id' => $model->id]);
            }
        } else {
            return $this->render('pku-screening', [
                'model' => $model,
            ]);
        }
    }

    public function actionOaeScreening($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ivh-screening', 'id' => $model->id]);
        } else {
            return $this->render('oae-screening', [
                'model' => $model,
            ]);
        }
    }

    public function actionIvhScreening($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['rop-screening', 'id' => $model->id]);
        } else {
            return $this->render('ivh-screening', [
                'model' => $model,
            ]);
        }
    }

    public function actionRopScreening($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['patient-visit/view', 'id' => $model->id]);
        } else {
            return $this->render('rop-screening', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('pku-screening', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = PatientVisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 