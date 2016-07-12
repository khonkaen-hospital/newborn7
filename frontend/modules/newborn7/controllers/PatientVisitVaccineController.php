<?php

namespace frontend\modules\newborn7\controllers;

use Yii;
use frontend\modules\newborn7\models\PatientVisitVaccine;
use frontend\modules\newborn7\models\PatientVisitVaccineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\base\Model;

/**
 * PatientVisitVaccineController implements the CRUD actions for PatientVisitVaccine model.
 */
class PatientVisitVaccineController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all PatientVisitVaccine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientVisitVaccineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientVisitVaccine model.
     * @param integer $visit_id
     * @param string $vaccine_no
     * @return mixed
     */
    public function actionView($visit_id, $vaccine_no)
    {
        return $this->render('view', [
            'model' => $this->findModel($visit_id, $vaccine_no),
        ]);
    }

    /**
     * Creates a new PatientVisitVaccine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $model = new PatientVisitVaccine();
        $model->visit_id = $id;
        if ($model->load(Yii::$app->request->post())) {

            $vaccineList = $_POST['PatientVisitVaccine']['vaccine_no'];

            if (!empty($vaccineList)) {

                foreach ($vaccineList as $value) {

                    $model = new PatientVisitVaccine();
                    $model->visit_id = $id;
                    $model->vaccine_no = $value;
                    $model->vaccine_other = $_POST['PatientVisitVaccine']['vaccine_other'];

                    $model->save();
                }
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => 'บันทึกข้อมูลเรียบร้อยแล้ว!',
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->redirect(['patient-visit-develop/create', 'id' => $model->visit_id]);

            } else {

                Yii::$app->getSession()->setFlash('alert', [
                    'body' => 'ยังไม่ได้รับ Vaccine !',
                    'options' => ['class' => 'alert-warning']
                ]);
                return $this->redirect(['patient-visit-develop/create', 'id' => $model->visit_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }

    /**
     * Updates an existing PatientVisitVaccine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $visit_id
     * @param string $vaccine_no
     * @return mixed
     */
    public function actionUpdate($visit_id, $vaccine_no)
    {
        $model = $this->findModel($visit_id, $vaccine_no);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'visit_id' => $model->visit_id, 'vaccine_no' => $model->vaccine_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PatientVisitVaccine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $visit_id
     * @param string $vaccine_no
     * @return mixed
     */
    public function actionDelete($visit_id, $vaccine_no)
    {
        $this->findModel($visit_id, $vaccine_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientVisitVaccine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $visit_id
     * @param string $vaccine_no
     * @return PatientVisitVaccine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($visit_id, $vaccine_no)
    {
        if (($model = PatientVisitVaccine::findOne(['visit_id' => $visit_id, 'vaccine_no' => $vaccine_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
