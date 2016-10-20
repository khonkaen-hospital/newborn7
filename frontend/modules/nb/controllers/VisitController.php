<?php

namespace frontend\modules\nb\controllers;

use Yii;
use frontend\modules\nb\models\Person;
use frontend\modules\nb\models\Visit;
use frontend\modules\nb\models\VisitSearch;
use frontend\modules\nb\models\VisitScreening;
use frontend\modules\nb\models\VisitScreeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VisitController implements the CRUD actions for Visit model.
 */
class VisitController extends Controller
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
     * Lists all Visit models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $person = $this->findModelPerson($id);
        $searchModel = new VisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$person->newborn_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'person' => $person
        ]);
    }


    public function actionScreening($id,$visit_id)
    {
        $model = $this->findModel($visit_id);
        $person = $this->findModelPerson($id);
      //  $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->visit_id]);
        } else {

            list($tskSearchModel,$tskDataprovider) = $this->loadScreenDataprovider($visit_id,'tshpku');
            list($oaeSearchModel,$oaeDataprovider) = $this->loadScreenDataprovider($visit_id,'oae');
            list($ivhSearchModel,$ivhDataprovider) = $this->loadScreenDataprovider($visit_id,'ivh');
            list($ropSearchModel,$ropDataprovider) = $this->loadScreenDataprovider($visit_id,'rop');

            $tskDataprovider->pagination->pageParam = 'tsk-page';
            $tskDataprovider->sort->sortParam       = 'tsk-sort';
            $oaeDataprovider->pagination->pageParam = 'oae-page';
            $oaeDataprovider->sort->sortParam       = 'oae-sort';
            $ivhDataprovider->pagination->pageParam = 'ivh-page';
            $ivhDataprovider->sort->sortParam       = 'ivh-sort';
            $ropDataprovider->pagination->pageParam = 'rop-page';
            $ropDataprovider->sort->sortParam       = 'rop-sort';

            return $this->render('screening', [
                'model' => $model,
                'visit_id' => $visit_id,
                'id' => $id,
                'person' => $person,
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
        $person = $this->findModelPerson($id);
        $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['disease', 'id' => $person->newborn_id, 'visit_id'=>$model->visit_id]);
        } else {
            return $this->render('disease', [
                'model' => $model,
                'id'=> $id,
                'person'=>$person
            ]);
        }
    }

    /**
     * Displays a single Visit model.
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
     * Creates a new Visit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $person = $this->findModelPerson($id);
        $model = new Visit([
          'patient_id' => $person->newborn_id,
          'hospcode' => Yii::$app->user->identity->profile->hcode,
          'date' => date('d-m-').(date('Y')+543)
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id'=>$person->newborn_id,'visit_id' => $model->visit_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'person' => $person
            ]);
        }
    }

    /**
     * Updates an existing Visit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$visit_id)
    {
        $person = $this->findModelPerson($id);
        $model  = $this->findModel($visit_id);
        $model->fieldToArray(['vaccine','disease','complication','procedure_code']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        } else {
            return $this->render('update', [
                'model' => $model,
                'person' => $person
            ]);
        }
    }

    /**
     * Deletes an existing Visit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function loadScreenDataprovider($visit_id,$type)
    {
        $searchModel = new VisitScreeningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$visit_id,$type);
        return [$searchModel,$dataProvider];
    }

    /**
     * Finds the Visit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPerson($id)
    {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
