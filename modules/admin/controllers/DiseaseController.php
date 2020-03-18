<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Disease;
use app\modules\admin\models\DiseaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DiseaseController implements the CRUD actions for disease model.
 */
class DiseaseController extends Controller
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
     * Lists all disease models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiseaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single disease model.
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
     * Creates a new disease model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new disease();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if( $model->image ){
                $model->upload();
            }
            unset($model->image);

            Yii::$app->session->setFlash('success', "Изменения сохранены");

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing disease model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if( $model->image ){
                $model->upload();
            }
            unset($model->image);

            Yii::$app->session->setFlash('success', "Изменения сохранены");

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing disease model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionDeletephoto($id, $image, $g)
    {
        $model = $this->findModel($id);
        if ($g==0) {
            $img = $model->getImage();
            $images = $model->getImages();
            $model->removeImage($img);
            foreach($images as $imeg){
                if($imeg->id==$image){
                    $model->removeImage($imeg);
                }
            }
        } else {
            $images = $model->getImages();
            foreach($images as $img){
                if($img->id==$image){
                    $model->removeImage($img);
                }
            }
        }

        if (Yii::$app->request->isAjax) {
            $this->layout = false;
            return 'success';
        }
        else {
            Yii::$app->session->setFlash('success', "Изображение удалено");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the disease model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return disease the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = disease::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
