<?php

use common\models\PemesananAdmin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PemesananAdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pemesanan Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
<div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Halaman Pemesanan</h2>
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
        <h6 class="mb-10">Data Pesanan Supplier</h6>
        <p class="text-sm mb-20">
                    Daftar Pesanan Supplier, Lakukan Pemeriksaan Status Pesanan Anda.
                  </p>
                   <div class="table-wrapper table-responsive">
                <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'tableOptions' => ['class' => 'table'],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'No',
                        'contentOptions' => ['style' => 'text-align:center; width:30px; padding: 20px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:30px;'],
                    ],
                   
                    [
                        'attribute' => 'data_barang_id',
                        'label' => 'Nama Barang',
                        'value' => function ($model) {
                            return $model->dataBarang ? $model->dataBarang->nama_barang : '(not set)';
                        },
                        'contentOptions' => ['style' => 'text-align:center; width:250px; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:250px;'],
                    ],
                    [
                        'attribute' => 'kode_pemesanan',
                        'label' => 'Kode Pemesanan',
                        'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center','style' => 'text-align:center; width:200px;'],
                    ],
                    
                    [
                        'attribute' => 'waktu_pemesanan',
                        'label' => 'Waktu Pemesanan',
                        'format' => ['date', 'php:Y-m-d'],
                        'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:200px;'],
                    ],
                    [
                        'attribute' => 'total',
                        'label' => 'Harga',
                        'format' => 'raw', // Karena kita akan melakukan format manual
                         'value' => function ($model) {
                            return 'Rp ' . number_format($model->total, 0, ',', '.');
                         },
                        'contentOptions' => ['style' => 'text-align:center; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:150px;'],
                    ],
                    
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {pembayaran}  {delete}',
                        'header' => 'Action',
                        'contentOptions' => ['style' => 'text-align:center; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:150px;'],
                        'buttons' => [

                            // Tombol pembayaran
                            'pembayaran' => function ($url, $model) {
                                
                                     $latestPayment = $model->getPembayarans()->where(['pemesanan_admin_id' => $model->id])->one();

                                    if ($latestPayment && $latestPayment->status_brg == 'Pengantaran') {
                                        return '';
                                        
                                    } elseif($latestPayment && $latestPayment->status_brg == 'Selesai'){
                                        return '';
                                    } else {
                                        return Html::a('<i class="lni lni-credit-cards"></i>', ['pembayarans/create', 'pemesanan_admin_id' => $model->id], [
                                            'class' => 'text-success me-2',
                                            'title' => 'Bayar Sekarang',
                                        ]);
                                    }
                                    return '';
                            },

                            'view' => function ($url, $model) {
                                return Html::a('<i class="lni lni-eye"></i>', ['view', 'id' => $model->id], [
                                    'class' => 'text-primary me-2',
                                    'title' => 'Lihat Detail',
                                ]);
                            },
                            // 'update' => function ($url, $model) {
                            //     return Html::a('<i class="lni lni-pencil-alt"></i>', ['update', 'id' => $model->id], [
                            //         'class' => 'text-info me-2',
                            //         'title' => 'Perbarui',
                            //     ]);
                            // },
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
                'pager' => [
                                        'class' => \yii\bootstrap5\LinkPager::class, // Ensure you're using Bootstrap 5 or the appropriate version
                                        'options' => [
                                            'class' => 'pagination justify-content-center',
                                            'style' => 'padding-top:40px'
                                        ],
                                    ],
            ]); ?>
        </div>

</div>

<hr>


    <div class="card-style mb-30">
                  <h6 class="mb-10">Produsen</h6>
                  <p class="text-sm mb-20">
                    Yuk kenalan dengan kami!
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                      <thead>
                        <tr>
                          
                          <th>
                            <h6>Produsen</h6>
                          </th>
                          <th>
                            <h6>Kode Produsen</h6>
                          </th>
                          <th>
                            <h6>No. Telp</h6>
                          </th>
                          <th>
                            <h6>Action</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                            <?php foreach ($dataBarang as $barang): ?>
                                <tr>
                                    <td>
                                        <?= Html::encode($barang->username) ?>    
                                    </td>
                                    <td>
                                        <?= Html::encode($barang->kode_supplier) ?>
                                    </td>
                                    <td>
                                        <?= Html::encode($barang->nomor_ponsel) ?>
                                    </td>
                                    <td>
                                        <?= Html::a('', ['data-barang/index', 'supplier_id' => $barang->id], ['class' => 'text-primary lni lni-cart']) ?>
                                       <!--  <?= Html::a('', ['suppliers/index', 'supplier_id' => $barang->id], ['class' => 'text-primary lni lni-eye']) ?> -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
</div>
