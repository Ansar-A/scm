<?php

namespace backend\controllers;

use common\models\Pembayarans;
use backend\models\PembayaransSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;
/**
 * PembayaransController implements the CRUD actions for Pembayarans model.
 */
class PembayaransController extends Controller
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
     * Lists all Pembayarans models.
     *
     * @return string
     */
    public function actionGetKodePemesanan($id)
    {
        $pemesanan = PemesananAdmin::findOne($id);
        if ($pemesanan !== null) {
            return $pemesanan->kode_pemesanan; // Mengembalikan kode_pemesanan
        }
        return '';
    }

    public function actionIndex()
    {
        $searchModel = new PembayaransSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembayarans model.
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
     * Creates a new Pembayarans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($pemesanan_admin_id = null)
    {
        $model = new Pembayarans();
        
        $model->kode_pembayaran = Pembayarans::generateKodePembayaran();
        $model->tanggal = date('Y-m-d');

        $model->scenario = 'update';

        // Jika pemesanan_admin_id dikirim dari URL, isi secara otomatis
        if ($pemesanan_admin_id !== null) {
            $model->pemesanan_admin_id = $pemesanan_admin_id;
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
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['index', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Pembayarans model.
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
     * Deletes an existing Pembayarans model.
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
     * Finds the Pembayarans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pembayarans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pembayarans::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
