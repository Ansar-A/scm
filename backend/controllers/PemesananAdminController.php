<?php

namespace backend\controllers;

use common\models\PemesananAdmin;
use backend\models\PemesananAdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Suppliers;
use common\models\Pembayarans;
use common\models\DataBarang;
use Yii;
/**
 * PemesananAdminController implements the CRUD actions for PemesananAdmin model.
 */
class PemesananAdminController extends Controller
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

    /**
     * Lists all PemesananAdmin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PemesananAdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataBarang = Suppliers::find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataBarang'=> $dataBarang,
        ]);
    }

    /**
     * Displays a single PemesananAdmin model.
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
     * Creates a new PemesananAdmin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new PemesananAdmin();

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
    public function actionCreate($data_barang_id = null)
{
    // $pembayaran = new Pembayarans();
    $model = new PemesananAdmin();
    $data = null;

    // Set data_barang_id if it is passed as a parameter
    if ($data_barang_id !== null) {
        $model->data_barang_id = $data_barang_id;

         

        // Fetch related supplier_id and harga_barang from the data_barang table
        $dataBarang = DataBarang::findOne($data_barang_id);
        if ($dataBarang !== null) {
            $supplier_id = $dataBarang->supplier_id;
            Yii::debug('Supplier ID: ' . $supplier_id); // Debugging to ensure correct supplier ID is fetched
            $data = $dataBarang; // Assign $dataBarang to $data to pass to the view
        } else {
            Yii::debug('Data Barang not found for ID: ' . $data_barang_id); // Debugging if no data_barang found
        }
    }

    // Check if the form has been posted
    if ($model->load(Yii::$app->request->post())) {
         $model->user_id = Yii::$app->user->identity->id;

         
        if ($dataBarang !== null) {
            $dataBarang->stok_barang -= $model->jumlah;
             if ($dataBarang->stok_barang < 0) {
                    Yii::$app->session->setFlash('error', 'Jumlah pesanan melebihi stok yang tersedia.');
                    return $this->redirect(['create']); // Redirect to form
             }
             if ($dataBarang->save(false)) {
                    Yii::$app->session->setFlash('success', 'Pemesanan berhasil dan stok barang telah diperbarui.');
                } else {
                    Yii::$app->session->setFlash('error', 'Terjadi kesalahan saat memperbarui stok barang.');
            }
        }
       
        // Fetch the related dataBarang again after form submission
        $data = DataBarang::findOne($model->data_barang_id);
        if ($model->jumlah > $data->stok_barang) {
            $model->addError('jumlah', 'Jumlah tidak boleh melebihi stok barang yang tersedia.');
        }
        // Calculate total: jumlah * harga_barang
        if ($model->jumlah && $data) {
            $model->total = $model->jumlah * $data->harga_barang;
        }

        // Generate a unique order code before saving
        $model->kode_pemesanan = PemesananAdmin::generateKodePemesanan();
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
    ]);
}








    public function actionUpdate($id)
{
    // Find the existing PemesananAdmin record based on the ID
    $model = $this->findModel($id);

    // Fetch related data_barang record based on the foreign key data_barang_id
    $data = DataBarang::findOne($model->data_barang_id);

    // If there is no related dataBarang, throw a 404 error
    if ($data === null) {
        throw new NotFoundHttpException('Data Barang tidak ditemukan.');
    }

    // Check if the form is posted and the model is loaded with the new data
    if ($model->load(Yii::$app->request->post())) {

        // Re-fetch the dataBarang in case the data_barang_id has changed in the form
        $data = DataBarang::findOne($model->data_barang_id);

        // Validate that the requested jumlah does not exceed stok_barang
        if ($model->jumlah > $data->stok_barang) {
            $model->addError('jumlah', 'Jumlah tidak boleh melebihi stok barang yang tersedia.');
        }

        // Calculate total: jumlah * harga_barang if validation passes
        if ($model->jumlah && $data) {
            $model->total = $model->jumlah * $data->harga_barang;
        }

        // Save the model if there are no validation errors
        if ($model->save()) {
            // Redirect to the view page after successful update
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            // If saving fails, debug the errors
            Yii::debug('Pemesanan gagal disimpan. Error: ' . print_r($model->errors, true));
        }
    }

    // Render the update form (GET request or if saving fails)
    return $this->render('update', [
        'model' => $model,
        'data' => $data,
    ]);
}


    /**
     * Deletes an existing PemesananAdmin model.
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
     * Finds the PemesananAdmin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PemesananAdmin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemesananAdmin::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
