<?php

namespace frontend\modules\newborn7\controllers;

use Yii;
use frontend\modules\newborn7\models\PatientSp;
use frontend\modules\newborn7\models\PatientSearch;
use frontend\modules\newborn7\models\Patient;
use frontend\modules\newborn7\models\Changwat;
use frontend\modules\newborn7\models\Amphoe;
use frontend\modules\newborn7\models\Tambon;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{

    public function actions()
    {
        return \yii\helpers\ArrayHelper::merge(parent::actions(), [
            'get-amphoe' => [
                'class' => \kartik\depdrop\DepDropAction::className(),
                'outputCallback' => function ($selectedId, $params) {
                  return Amphoe::find()->getAmphoeByChangwatID(substr($selectedId,0,2))->all();
                }
            ],
            'get-tambon' => [
                'class' => \kartik\depdrop\DepDropAction::className(),
                'outputCallback' => function ($selectedId, $params) {
                  return Tambon::find()->getTambonByAmphoeID(substr($selectedId,0,4))->all();
                }
            ]
        ]);
    }
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
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
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
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();
        $model->hospcode = Yii::$app->user->identity->profile->hospital->off_id;
        $model->prov = Yii::$app->user->identity->profile->hospital->provcode;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert',[
                'body'=>'บันทึกข้อมูลเรียบร้อยแล้ว!',
                'options'=>['class'=>'alert-success']
            ]);
            if(Yii::$app->request->post('btn-save-newborn') == 1){
              return $this->redirect(['/newborn7/patient/newborn', 'id' => $model->patient_id]);
            }else{
              return $this->redirect(['/newborn7/patient/update', 'id' => $model->patient_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert',[
                'body'=>'บันทึกข้อมูลเรียบร้อยแล้ว!',
                'options'=>['class'=>'alert-success']
            ]);
            return $this->refresh();
        } else {
            return $this->render('update', [
                'model' => $model,
                'id'=>$id
            ]);
        }
    }

    public function actionNewborn($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'newborn';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert',[
                'body'=>'บันทึกข้อมูลเรียบร้อยแล้ว!',
                'options'=>['class'=>'alert-success']
            ]);
            return $this->refresh();
        } else {
            return $this->render('_form_newborn', [
                'model' => $model,
                'id'=>$id
            ]);
        }
    }

    public function actionDead($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'dead';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        } else {
            return $this->render('_form_dead', [
                'model' => $model,
                'id'=>$id
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
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
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
