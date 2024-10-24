<?php

namespace backend\controllers;

use common\models\DataProduk;
use backend\models\DataProdukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
/**
 * DataProdukController implements the CRUD actions for DataProduk model.
 */
class DataProdukController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionGetKodeProduk($id)
    {
        $pemesanan = DataProduk::findOne($id);
        if ($pemesanan !== null) {
            return $pemesanan->kode_barang; // Mengembalikan kode_barang
        }
        return '';
    }

    public function actionIndex()
    {
        $searchModel = new DataProdukSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataProduk model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DataProduk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new DataProduk();
    //     $model->kode_barang = DataProduk::generateKodeProduk();
    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionCreate()
    {
        $model = new DataProduk();
        $model->kode_barang = DataProduk::generateKodeProduk();
        $model->scenario = 'update';

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->foto_barang = UploadedFile::getInstance($model, 'foto_barang');
                if($model->foto_barang != null && $model->validate()){
                    $filename = 'FotoBarang/' . md5(microtime()) . '.' . $model->foto_barang->extension;
                    $model->foto_barang->saveAs($filename);
                    $model->foto_barang = $filename;

                    $model->save(false);

                    Yii::$app->getSession()->setFlash('success', 'File berhasil diunggah.');

                    return $this->redirect(['index', 'id' => $model->id]);
                }

            }
        } 

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DataProduk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
{
    $model = $this->findModel($id);
    $oldFotoBarang = $model->foto_barang; // Store the old file name

    if ($this->request->isPost && $model->load($this->request->post())) {

        // Handle the file upload
        $model->foto_barang = UploadedFile::getInstance($model, 'foto_barang');

        if ($model->foto_barang != null) {
            // If a new file is uploaded, save it and replace the old one
            $filename = 'FotoBarang/' . md5(microtime()) . '.' . $model->foto_barang->extension;
            if ($model->foto_barang->saveAs($filename)) {
                $model->foto_barang = $filename;
            }
        } else {
            // If no new file is uploaded, retain the old file
            $model->foto_barang = $oldFotoBarang;
        }

        // Validate and save the model
        if ($model->validate()) {
            $model->save(false);

            Yii::$app->getSession()->setFlash('success', 'Data berhasil diperbarui.');
            return $this->redirect(['index', 'id' => $model->id]);
        }
    }

    return $this->render('update', [
        'model' => $model,
    ]);
}


    /**
     * Deletes an existing DataProduk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataProduk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return DataProduk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataProduk::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
