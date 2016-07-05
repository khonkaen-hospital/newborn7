<?php

namespace frontend\modules\newborn7\controllers;

use Yii;
use frontend\modules\newborn7\models\PatientSp;
use frontend\modules\newborn7\models\PatientSpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientSpController implements the CRUD actions for PatientSp model.
 */
class PatientSpController extends Controller
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
     * Lists all PatientSp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientSp model.
     * @param string $hospcode
     * @param string $sp
     * @param string $hn
     * @return mixed
     */
    public function actionView($hospcode, $sp, $hn)
    {
        return $this->render('view', [
            'model' => $this->findModel($hospcode, $sp, $hn),
        ]);
    }

    /**
     * Creates a new PatientSp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PatientSp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'hospcode' => $model->hospcode, 'sp' => $model->sp, 'hn' => $model->hn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PatientSp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $hospcode
     * @param string $sp
     * @param string $hn
     * @return mixed
     */
    public function actionUpdate($hospcode, $sp, $hn)
    {
        $model = $this->findModel($hospcode, $sp, $hn);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'hospcode' => $model->hospcode, 'sp' => $model->sp, 'hn' => $model->hn]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PatientSp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $hospcode
     * @param string $sp
     * @param string $hn
     * @return mixed
     */
    public function actionDelete($hospcode, $sp, $hn)
    {
        $this->findModel($hospcode, $sp, $hn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientSp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $hospcode
     * @param string $sp
     * @param string $hn
     * @return PatientSp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hospcode, $sp, $hn)
    {
        if (($model = PatientSp::findOne(['hospcode' => $hospcode, 'sp' => $sp, 'hn' => $hn])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
