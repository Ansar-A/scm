<?php

namespace consumen\controllers;

use common\models\PembayaranKonsumen;
use consumen\models\PembayaranKonsumenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

class PembayaranKonsumenController extends Controller
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

    /**
     * Lists all PembayaranKonsumen models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PembayaranKonsumenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PembayaranKonsumen model.
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
     * Creates a new PembayaranKonsumen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new PembayaranKonsumen();

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

    public function actionCreate($pemesanan_konsumen_id = null)
    {
        $model = new PembayaranKonsumen();
        
        $model->kode_pembayaran = PembayaranKonsumen::generateKodePembayaran();
        $model->tanggal = date('Y-m-d');

        $model->scenario = 'update';

        // Jika pemesanan_konsumen_id dikirim dari URL, isi secara otomatis
        if ($pemesanan_konsumen_id !== null) {
            $model->pemesanan_konsumen_id = $pemesanan_konsumen_id;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->gambar = UploadedFile::getInstance($model, 'gambar');
                if($model->gambar != null && $model->validate()){
                    $filename = 'FotoBarang/' . md5(microtime()) . '.' . $model->gambar->extension;
                    $model->gambar->saveAs($filename);
                    $model->gambar = $filename;

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
     * Updates an existing PembayaranKonsumen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PembayaranKonsumen model.
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
     * Finds the PembayaranKonsumen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PembayaranKonsumen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PembayaranKonsumen::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
