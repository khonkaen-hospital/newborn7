<?php

namespace frontend\modules\newborn7\controllers;

use Yii;
use frontend\modules\newborn7\models\PatientVisitDevelop;
use frontend\modules\newborn7\models\PatientVisitDevelopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientVisitDevelopController implements the CRUD actions for PatientVisitDevelop model.
 */
class PatientVisitDevelopController extends Controller
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
     * Lists all PatientVisitDevelop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientVisitDevelopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientVisitDevelop model.
     * @param integer $visit_id
     * @param string $age_group
     * @param string $develop_no
     * @return mixed
     */
    public function actionView($visit_id, $age_group, $develop_no)
    {
        return $this->render('view', [
            'model' => $this->findModel($visit_id, $age_group, $develop_no),
        ]);
    }

    /**
     * Creates a new PatientVisitDevelop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $model = new PatientVisitDevelop();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                $model->visit_id = $id;
                Yii::$app->getSession()->setFlash('alert',[
                    'body'=>'บันทึกข้อมูลเรียบร้อยแล้ว!',
                    'options'=>['class'=>'alert-success']
                ]);
                return $this->redirect(['patient-visit-vaccine', 'id' => $model->visit_id]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }

    /**
     * Updates an existing PatientVisitDevelop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $visit_id
     * @param string $age_group
     * @param string $develop_no
     * @return mixed
     */
    public function actionUpdate($visit_id, $age_group, $develop_no)
    {
        $model = $this->findModel($visit_id, $age_group, $develop_no);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'visit_id' => $model->visit_id, 'age_group' => $model->age_group, 'develop_no' => $model->develop_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PatientVisitDevelop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $visit_id
     * @param string $age_group
     * @param string $develop_no
     * @return mixed
     */
    public function actionDelete($visit_id, $age_group, $develop_no)
    {
        $this->findModel($visit_id, $age_group, $develop_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientVisitDevelop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $visit_id
     * @param string $age_group
     * @param string $develop_no
     * @return PatientVisitDevelop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($visit_id, $age_group, $develop_no)
    {
        if (($model = PatientVisitDevelop::findOne(['visit_id' => $visit_id, 'age_group' => $age_group, 'develop_no' => $develop_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
