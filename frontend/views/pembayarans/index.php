<?php

use common\models\Pembayarans;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\editable\Editable;

/** @var yii\web\View $this */
/** @var frontend\models\PembayaransSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pembayarans';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
    .status-btn {
        padding: 5px 10px;
        border-radius: 50px;
        color: #fff;
    }
    .success-btn {
        background-color: #28a745; /* Hijau */
    }
    .warning-btn {
        background-color: #ffc107; /* Kuning */
    }
    .info-btn {
        background-color: #17a2b8; /* Biru */
    }
");

?>
<div class="content-wrapper">
    <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
        <a class="nav-link " href="<?=Url::to(['data-barang/index'])?>" aria-selected="true">Data Barang</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link active"  href="<?=Url::to(['jenis-barang/index'])?>" >Jenis</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" href="<?=Url::to(['merek-barang/index'])?>" >Merek</a>
        </li>
        </ul>
        <div>
        <div class="btn-wrapper">
        <a href="<?=Url::to(['site/index'])?>" class="btn btn-otline-dark"><i class="mdi mdi-grid-large menu-icon"></i> Dashboard</a>
        <a href="<?=Url::to(['pemesanan-admin/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-layers-outline"></i> Pemesanan</a>
        <a href="<?=Url::to(['pembayarans/index'])?>" class="btn btn-primary text-white me-0"><i class="menu-icon mdi mdi-chart-line"></i> Pembayaran</a>
        <a href="<?=Url::to(['user/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-account-circle-outline"></i> Me</a>
        </div>
        </div>
        </div>
        </div>
        <div class="pt-4">
            <?= $this->render('_search', ['model' => $searchModel]) ?>
        </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        
                        <div class="row">
                        <div class="col-lg-4">
                            <h4 class="card-title">Table Data Pembayaran Barang</h4>
                            <p class="card-description"> List Data Pembayaran Barang Anda.
                            </p>
                        </div>
                       
                    </div>
                      
                    </div>
                    
                    
                    <div class="table-responsive">
                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'summary' => false,
                        'tableOptions' => ['class' => 'table table-striped'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],
                
                // Kolom editable
                
                [
                    'attribute' => 'pemesanan_admin_id',
                    'label' => 'Barang',
                    'format' => 'raw',
                    'value' => function($model) {
                        // Access the related `pemesananAdmin` and `dataBarang` to get the ID for the link
                        $dataBarang = $model->pemesananAdmin->dataBarang ?? null; // Make sure dataBarang exists
                        if ($dataBarang) {
                            return Html::a('Lihat Barang', ['data-barang/view', 'id' => $dataBarang->id]); // Use dataBarang's ID
                        } else {
                            return 'Barang tidak ditemukan';
                        }
                    }
                ],

                   [
                    'attribute' => 'status_brg',
                    'label' => 'Status Pembayaran',
                    'format' => 'raw', // Pastikan formatnya 'raw'
                    'value' => function($model) {
                        // Sesuaikan logika di bawah ini sesuai dengan nilai status_brg yang mungkin ada
                        if ($model->status_brg === 'Selesai') {
                            return '<span class="status-btn success-btn">Selesai</span>';
                        } elseif ($model->status_brg === 'Pengantaran') {
                            return '<span class="status-btn warning-btn">Pengantaran</span>';
                        } else {
                            return '<span class="status-btn info-btn">Validasi</span>';
                        }
                    },
                ],

                'kode_pembayaran',
                'tanggal',
                // Action column
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'header' => 'Action Column',
                    'headerOptions' => ['class' => 'text-center'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<i class="fa fa-eye"></i>', ['view', 'id' => $model->id], [
                                'class' => 'btn btn-inverse-primary btn-icon btn-sm',
                                'title' => 'Lihat Detail',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->id], [
                                'class' => 'btn btn-inverse-info btn-icon btn-sm',
                                'title' => 'Perbarui',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-inverse-danger btn-icon btn-sm',
                                'title' => 'Hapus',
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                        ],
                        // 'pager' => [
                        //                         'class' => \yii\bootstrap\LinkPager::class,
                        //                         'options' => [
                        //                             'class' => 'pagination justify-content-center',
                        //                             'style' => 'padding-top:40px'
                        //                         ],
                        //         ],
                    ],
                ]); ?>

                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>


         
