<?php

use common\models\PemesananKonsumen;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PemesananvSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pemesanan Konsumens';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Halaman Pemesanan Konsumen</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Data Pemesanan
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-style mb-30">
        <h6 class="mb-10">Data Pesanan Konsumen</h6>
        <p class="text-sm mb-20">
                    Daftar Pesanan Konsumen, Lakukan Pemeriksaan Status Pesanan Anda.
                  </p>
                   <div class="table-wrapper table-responsive">
               
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'summary'=>false,
        'tableOptions'=>['class'=>'table'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn', 
                'header'=>'No',
                'contentOptions' => ['style' => 'text-align:center; width:30px; padding: 20px;'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:30px;'],
            ],
            [
                'attribute' => 'barang_masuk_id',
                'label' => 'Nama Barang',
                'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                'headerOptions' => ['class' => 'text-center','style' => 'text-align:center; width:200px;'],
                'value' =>function($model){
                    return $model->dataProduk->nama_barang;
                }
            ],
            [
                'attribute' => 'kode_pemesanan',
                'label' => 'Kode Pemesanan',
                'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                // 'headerOptions' => ['class' => 'text-center','style' => 'text-align:center; width:200px;'],
            ],
            [
                'attribute' => 'waktu_pemesanan',
                'label' => 'Waktu Pemesanan',
                'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                'headerOptions' => ['class' => 'text-center','style' => 'text-align:center; width:200px;'],
            ],
            [
                'attribute' => 'status',
                'label' => 'Status',
                'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                'headerOptions' => ['class' => 'text-center','style' => 'text-align:center; width:200px;'],

            ],
            
            //'created_at',
            //'updated_at',
            [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update}  {delete}',
                        'header' => 'Action',
                        'contentOptions' => ['style' => 'text-align:center; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:150px;'],
                        'buttons' => [

                            'view' => function ($url, $model) {
                                return Html::a('<i class="lni lni-eye"></i>', ['view', 'id' => $model->id], [
                                    'class' => 'text-primary me-2',
                                    'title' => 'Lihat Detail',
                                ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<i class="lni lni-pencil-alt"></i>', ['update', 'id' => $model->id], [
                                    'class' => 'text-info me-2',
                                    'title' => 'Perbarui',
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="lni lni-trash-can"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'text-danger me-2',
                                    'title' => 'Batalkan Pesanan',
                                    'data' => [
                                        'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                    ],
        ],
    ]); ?>
        </div>

</div>

</div>
