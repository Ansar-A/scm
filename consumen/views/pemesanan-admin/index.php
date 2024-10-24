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
        <h6 class="mb-10">Data Pesanan Admin</h6>
        <p class="text-sm mb-20">
                    Daftar Pesanan Admin, Lakukan Pemeriksaan Status Pesanan Anda.
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
                                'header' => 'Photo',
                                'contentOptions' => ['style' => 'text-align:center; width:100px;'],
                                'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:100px;'],
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<center>' . Html::img('@web/' . $model->dataBarang->foto_barang, ['style' => 'heigth: 50px; width:50px;', 'class' => 'employee-image']) . '</center>';
                                }
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
                    // [
                    //     'attribute' => 'jumlah',
                    //     'label' => 'Jumlah',
                    //     'contentOptions' => ['style' => 'text-align:center; width:80px; padding: 10px;'],
                    //     'headerOptions' => ['class' => 'text-center'],
                    // ],
                    // [
                    //     'attribute' => 'total',
                    //     'label' => 'Total',
                    //     'contentOptions' => ['style' => 'text-align:center; width:50px; padding: 10px;'],
                    //     'headerOptions' => ['class' => 'text-center'],
                    // ],
                    [
                        'attribute' => 'waktu_pemesanan',
                        'label' => 'Waktu Pemesanan',
                        'format' => ['date', 'php:Y-m-d'],
                        'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:200px;'],
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Status Pemesanan',
                        'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:200px;'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{pembayaran} {update}  {delete}',
                        'header' => 'Action',
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'buttons' => [

                            // Tombol pembayaran
                            'pembayaran' => function ($url, $model) {
                                return Html::a('<i class="lni lni-credit-cards"></i>', ['pembayarans/create', 'pemesanan_admin_id' => $model->id], [
                                    'class' => 'text-success me-2',
                                    'title' => 'Bayar Sekarang',
                                ]);
                            },

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
                                    'title' => 'Hapus',
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
                  <h6 class="mb-10">Tambah Pesanan</h6>
                  <p class="text-sm mb-20">
                    Daftar Supplier yang Tersedia
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                      <thead>
                        <tr>
                          
                          <th>
                            <h6>Supplier</h6>
                          </th>
                          <th>
                            <h6>Kode Supplier</h6>
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
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
</div>
