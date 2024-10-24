<?php

namespace consumen\controllers;

use common\models\PemesananKonsumen;
use consumen\models\PemesananvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\DataProduk;
use Yii;
use common\models\User;
/**
 * PemesananKonsumenController implements the CRUD actions for PemesananKonsumen model.
 */
class PemesananKonsumenController extends Controller
{
    
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
    public function actionLogout()
    {
        Yii::$app->user->logout(); // Melakukan logout

        return $this->goHome(); // Arahkan ke halaman home setelah logout
    }
    public function actionIndex()
    {
        $searchModel = new PemesananvSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProduk = User::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProduk'=>$dataProduk,
        ]);

    }

    /**
     * Displays a single PemesananKonsumen model.
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
     * Creates a new PemesananKonsumen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new PemesananKonsumen();

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

    public function actionCreate($barang_masuk_id = null)
    {
        // $pembayaran = new Pembayarans();
        $model = new PemesananKonsumen();
        $data = null;

        // Set barang_masuk_id if it is passed as a parameter
        if ($barang_masuk_id !== null) {
            $model->barang_masuk_id = $barang_masuk_id;

            // Fetch related user_id and harga_barang from the data_barang table
            $dataProduk = DataProduk::findOne($barang_masuk_id);
            if ($dataProduk !== null) {
                $user_id = $dataProduk->user_id;
                Yii::debug('Admin ID: ' . $user_id); // Debugging to ensure correct supplier ID is fetched
                $data = $dataProduk; // Assign $dataBarang to $data to pass to the view
            } else {
                Yii::debug('Data Barang not found for ID: ' . $barang_masuk_id); // Debugging if no data_barang found
            }
        }

        // dueDate
   
        // Example: setting the due date (current date + 7 days)
        $dueDate = date('d/m/Y', strtotime('+7 days'));





        // Check if the form has been posted
        if ($model->load(Yii::$app->request->post())) {

           
            // Fetch the related dataBarang again after form submission
            $data = DataProduk::findOne($model->barang_masuk_id);
            if ($model->jumlah > $data->stok_barang) {
                $model->addError('jumlah', 'Jumlah tidak boleh melebihi stok barang yang tersedia.');
            }
            // Calculate total: jumlah * harga_barang
            if ($model->jumlah && $data) {
                $model->total = $model->jumlah * $data->harga_barang;
            }

            // Generate a unique order code before saving
            $model->kode_pemesanan = PemesananKonsumen::generateKodePemesanan();
            Yii::debug('Kode Pemesanan: ' . $model->kode_pemesanan); // Debugging to confirm the code is generated

            // Save the model after the order code and total have been set
            if ($model->save()) {
                Yii::debug('Pemesanan berhasil disimpan dengan kode: ' . $model->kode_pemesanan); // Debugging
                

                // $pembayaran->pemesanan_admin_id = $model->id;
                // if ($pembayaran->save()) {
                //     Yii::debug('Pembayaran berhasil disimpan.'); 
                // } else {
                    
                //     Yii::debug('Pembayaran gagal disimpan. Error: ' . print_r($pembayaran->errors, true));
                // }


                return $this->redirect(['index']);
            } else {
                // Debugging if the save fails
                Yii::debug('Pemesanan gagal disimpan. Error: ' . print_r($model->errors, true));
            }
        }

        // Render the form for GET request (show the create form)
        return $this->render('create', [
            'model' => $model,
            'data' => $data, // This will now be passed to the view

            'dueDate' => $dueDate,
        ]);
    }


    /**
     * Updates an existing PemesananKonsumen model.
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
     * Deletes an existing PemesananKonsumen model.
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
     * Finds the PemesananKonsumen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PemesananKonsumen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemesananKonsumen::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}
