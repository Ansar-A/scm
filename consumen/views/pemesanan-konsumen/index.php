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
                    <h2>Halaman Pemesanan</h2>
                </div>
            </div>
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
        </div>
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
                            return '<center>' . Html::img('@web/' . $model->dataProduk->foto_barang, ['style' => 'heigth: 50px; width:50px;', 'class' => 'employee-image']) . '</center>';
                        }
                    ],
                    
                    [
                        'attribute' => 'data_barang_id',
                        'label' => 'Nama Barang',
                        'value' => function ($model) {
                            return $model->dataProduk ? $model->dataProduk->nama_barang : '(not set)';
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
                        'attribute' => 'total',
                        'label' => 'Total',
                        'contentOptions' => ['style' => 'text-align:center; width:200px; padding: 10px;'],
                        'headerOptions' => ['class' => 'text-center','style' => 'text-align:center; width:200px;'],
                         'format' => ['currency', 'Rp'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{pembayaran} {view} {delete}',
                        'header' => 'Action',
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:500px;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'buttons' => [
                            'pembayaran' => function ($url, $model) {
                                $latestPayment = $model->getPembayaranKonsumens()->where(['pemesanan_konsumen_id'=>$model->id])->one();
                                if ($latestPayment && $latestPayment->status_brg == 'Pengantaran') {
                                        return '';
                                        
                                } elseif($latestPayment && $latestPayment->status_brg == 'Selesai'){
                                        return '';
                                }else{
                                    return Html::a('<i class="lni lni-credit-cards"></i>', ['pembayaran-konsumen/create', 'pemesanan_konsumen_id' => $model->id], [
                                    'class' => 'main-btn active-btn-light btn-hover btn-sm',
                                    'title' => 'Bayar Sekarang',
                                ]);
                                }
                            },

                          

                            'view' => function ($url, $model) {
                                return Html::a('<i class="lni lni-eye"></i>', ['view', 'id' => $model->id], [
                                    'class' => 'main-btn success-btn-light btn-hover btn-sm',
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
                                return Html::a('<i class="lni lni-close"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'main-btn danger-btn-light btn-hover btn-sm',
                                    'title' => 'Cancel',
                                    'data' => [
                                        'confirm' => 'Apakah Anda yakin ingin cancel item ini?',
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
                            <h6>No. Telp</h6>
                          </th>
                          <th>
                            <h6>Alamat</h6>
                          </th>
                          <th>
                            <h6>Action</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                            <?php foreach ($dataProduk as $barang): ?>
                                <tr>
                                    <td>
                                        <?= Html::encode($barang->username) ?>    
                                    </td>
                                    <td>
                                        <?= Html::encode($barang->phone) ?>    
                                    </td>
                                    <td>
                                        <?= Html::encode($barang->alamat) ?>    
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


