<?php

namespace frontend\controllers;

use common\models\DataBarang;
use frontend\models\DataBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
use PhpOffice\PhpSpreadsheet\IOFactory; // Correct PhpSpreadsheet namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataBarangController extends Controller
{
    public function actionExportExcel()
    {
        // Fetch all data from the DataBarang model
        $dataBarang = DataBarang::find()->all();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header for the Excel file
        $sheet->setCellValue('A1', 'ID')
              ->setCellValue('B1', 'Nama Barang')
              ->setCellValue('C1', 'Harga Barang')
              ->setCellValue('D1', 'Stok Barang')
              ->setCellValue('E1', 'Deskripsi');

        // Populate the data
        $row = 2; // Start from the second row (first row is the header)
        foreach ($dataBarang as $barang) {
            $sheet->setCellValue('A' . $row, $barang->id)
                  ->setCellValue('B' . $row, $barang->nama_barang)
                  ->setCellValue('C' . $row, $barang->harga_barang)
                  ->setCellValue('D' . $row, $barang->stok_barang)
                  ->setCellValue('E' . $row, $barang->deskripsi);
            $row++;
        }

        // Set the file name
        $fileName = 'data-barang-' . date('YmdHis') . '.xlsx';

        // Create the writer and output the Excel file
        $writer = new Xlsx($spreadsheet);

        // Output the file as an Excel file download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }



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

    public function actionIndex()
    {
        $searchModel = new DataBarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new DataBarang();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single DataBarang model.
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
     * Creates a new DataBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DataBarang();
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

                    return $this->redirect(['view', 'id' => $model->id]);
                }

                // Generate a random kode_barang with a prefix 'BR'
                $randomNumber = mt_rand(100, 999); // Generate a random number between 100 and 999
                $newCode = 'BR' . $randomNumber;

                // Set the generated kode_barang in the model
                $model->kode_barang = $newCode;

            }
        } else {
            // Generate kode_barang and set it in the model if it's a GET request
            $randomNumber = mt_rand(100, 999);
            $newCode = 'BR' . $randomNumber;
            $model->kode_barang = $newCode;

            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing DataBarang model.
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
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    return $this->render('update', [
        'model' => $model,
    ]);
}

    /**
     * Deletes an existing DataBarang model.
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
     * Finds the DataBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return DataBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataBarang::findOne(['id' => $id])) !== null) {
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
