<?php

namespace frontend\modules\newborn7\controllers;

use frontend\modules\newborn7\models\Patient;
use Yii;
use frontend\modules\newborn7\models\PatientVisit;
use frontend\modules\newborn7\models\PatientVisitSearch;
use frontend\modules\newborn7\models\VisitScreening;
use frontend\modules\newborn7\models\VisitScreeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;

/**
 * PatientVisitController implements the CRUD actions for PatientVisit model.
 */
class PatientVisitController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PatientVisit models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $patient = $this->findPatientModel($id);
        $searchModel = new PatientVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
            'patient' => $patient
        ]);
    }

    public function loadScreenDataprovider($visit_id,$type)
    {
        $searchModel = new VisitScreeningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$visit_id,$type);
        return [$searchModel,$dataProvider];
    }

    /**
     * Displays a single PatientVisit model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PatientVisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new PatientVisit();
        $patient = $this->findPatientModel($id);
        $model->hospcode = $patient->hospcode;
        $model->seq = $patient->seq;
        $model->patient_id = $patient->patient_id;
        $model->hn = $patient->hn;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert', [
                'type' => 'success',
                'icon' => 'fa fa-users',
                'title' => Yii::t('app', Html::encode('Success!')),
                'message' => Yii::t('app', Html::encode('บันทึกข้อมูลเรียบร้อยแล้ว')),
            ]);

            return $this->redirect(['patient-visit/index', 'id' => $model->patient_id]);
        } else {

            return $this->render('create', [
                'model' => $model,
                'id' => $id,
                'patient' => $patient
            ]);
        }
    }

    /**
     * Updates an existing PatientVisit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$visit_id)
    {
        $model = $this->findModel($visit_id);
        $patient = $this->findPatientModel($id);
        $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->visit_id]);
        } else {

            list($tskSearchModel,$tskDataprovider) = $this->loadScreenDataprovider($visit_id,'tshpku');
            list($oaeSearchModel,$oaeDataprovider) = $this->loadScreenDataprovider($visit_id,'oae');
            list($ivhSearchModel,$ivhDataprovider) = $this->loadScreenDataprovider($visit_id,'ivh');
            list($ropSearchModel,$ropDataprovider) = $this->loadScreenDataprovider($visit_id,'rop');

            return $this->render('update', [
                'model' => $model,
                'id'=>$id,
                'patient'=>$patient,
                'tskSearchModel' => $tskSearchModel,
                'tskDataprovider' => $tskDataprovider,
                'oaeSearchModel' => $oaeSearchModel,
                'oaeDataprovider' => $oaeDataprovider,
                'ivhSearchModel' => $ivhSearchModel,
                'ivhDataprovider' => $ivhDataprovider,
                'ropSearchModel' => $ropSearchModel,
                'ropDataprovider' => $ropDataprovider
            ]);
        }
    }


    public function actionScreening($id,$visit_id)
    {
        $model = $this->findModel($visit_id);
        $patient = $this->findPatientModel($id);
        $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->visit_id]);
        } else {

            list($tskSearchModel,$tskDataprovider) = $this->loadScreenDataprovider($visit_id,'tshpku');
            list($oaeSearchModel,$oaeDataprovider) = $this->loadScreenDataprovider($visit_id,'oae');
            list($ivhSearchModel,$ivhDataprovider) = $this->loadScreenDataprovider($visit_id,'ivh');
            list($ropSearchModel,$ropDataprovider) = $this->loadScreenDataprovider($visit_id,'rop');

            return $this->render('screening', [
                'model' => $model,
                'id'=>$id,
                'patient'=>$patient,
                'tskSearchModel' => $tskSearchModel,
                'tskDataprovider' => $tskDataprovider,
                'oaeSearchModel' => $oaeSearchModel,
                'oaeDataprovider' => $oaeDataprovider,
                'ivhSearchModel' => $ivhSearchModel,
                'ivhDataprovider' => $ivhDataprovider,
                'ropSearchModel' => $ropSearchModel,
                'ropDataprovider' => $ropDataprovider
            ]);
        }
    }
    public function actionDisease($id,$visit_id)
    {
        $model = $this->findModel($visit_id);
        $patient = $this->findPatientModel($id);
        $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->visit_id]);
        } else {



            return $this->render('disease', [
                'model' => $model,
                'id'=>$id,
                'patient'=>$patient
            ]);
        }
    }

    /**
     * Deletes an existing PatientVisit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientVisit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientVisit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientVisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findPatientModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
