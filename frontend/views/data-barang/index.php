<?php

use common\models\DataBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\DataBarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Barangs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">

        <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
        <a class="nav-link active ps-0" href="<?=Url::to(['data-barang/index'])?>" aria-selected="true">Data Barang</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link"  href="<?=Url::to(['jenis-barang/index'])?>" >Jenis</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link" href="<?=Url::to(['merek-barang/index'])?>" >Merek</a>
        </li>
        </ul>
        <div>
        <div class="btn-wrapper">
        <a href="<?=Url::to(['site/index'])?>" class="btn btn-otline-dark"><i class="mdi mdi-grid-large menu-icon"></i> Dashboard</a>
        <a href="<?=Url::to(['pemesanan-admin/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-layers-outline"></i> Pemesanan</a>
        <a href="<?=Url::to(['pembayarans/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-chart-line"></i> Pembayaran</a>
        <a href="<?=Url::to(['user/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-account-circle-outline"></i> Me</a>
        </div>
        </div>
        </div>
        </div>
                  
     <?= $this->render('_search', ['model' => $searchModel]) ?>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="card-title">Table Data Barang</h4>
                            <p class="card-description"> List Data Barang Anda.
                            </p>
                        </div>
                        <div class="col-lg-8 text-end">
                        <?= Html::a('<i class="fa fa-file-excel-o"></i> Export', ['export-excel'], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::a('<i class="fa fa-plus"></i> Add Barang', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'summary'=>false,
                        'tableOptions'=>['class'=>'table table-striped'],
                        'columns' => [
                            
                            ['class' => 'yii\grid\SerialColumn', 'header'=>'No'],
                            // ['attribute'=>'supplier_id',
                            //             'value' => function($model){
                            //                 return $model->supplier->username;
                            //             }],
                                        
                                        ['attribute'=>'jenis_barang_id',
                                        'value' => function($model){
                                            return $model->jenisBarang->nama;
                                        }],
                                        // ['attribute'=>'merek_barang_id',
                                        // 'value' => function($model){
                                        //     return $model->merekBarang->nama;
                                        // }],
                                        [
                                            'attribute' => 'harga_barang',
                                            'format' => 'raw', // Karena kita akan melakukan format manual
                                            'value' => function ($model) {
                                                return 'Rp ' . number_format($model->harga_barang, 0, ',', '.');
                                            },
                                        ],
                                        'stok_barang',
                                        'kode_barang',
                                        'nama_barang',
                                        //'deskripsi:ntext',
                                        // [
                                        //         'header' => 'Photo',
                                        //         'contentOptions' => ['style' => 'text-align:center'],
                                        //         'headerOptions' => ['class' => 'text-center'],
                                        //         'format' => 'raw',
                                        //         'value' => function ($model) {
                                        //             return '<center>' . Html::img('@web/' . $model->foto_barang, ['style' => 'heigth: 50px; width:50px;', 'class' => 'img-responsive img-rounded']) . '</center>';
                                        //         }
                                        //     ],
                                        //'harga_barang',
                                        //'stok_barang',
                                        //'created_at',
                                        //'updated_at',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update}  {delete}',
                                'header' => 'Action Collumn',
                                'headerOptions' => ['class' => 'text-center',],
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
                </div>
              </div>
              
            </div>
          </div>


