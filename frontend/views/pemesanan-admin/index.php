<?php

use common\models\PemesananAdmin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PemesananAdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pemesanan Admins';
$this->params['breadcrumbs'][] = $this->title;
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
        <a href="<?=Url::to(['pemesanan-admin/index'])?>" class="btn btn-primary text-white me-0"><i class="menu-icon mdi mdi-layers-outline"></i> Pemesanan</a>
        <a href="<?=Url::to(['pembayarans/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-chart-line"></i> Pembayaran</a>
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
                            <h4 class="card-title">Table Data Pemesanan From Admin</h4>
                            <p class="card-description"> List Data Pemesanan From Admin Anda.
                            </p>
                        </div>
                       <!--  <div class="col-lg-8 text-end">
                                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                            </div> -->
                    </div>
                       <!--  -->
                    </div>
                    
                    
                    <div class="table-responsive">
                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'summary'=>false,
                        'tableOptions'=>['class'=>'table table-striped'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'header'=>'No'],
                            // [
                            //     'header' => 'Photo Barang',
                            //     'contentOptions' => ['style' => 'text-align:center; width:100px;'],
                            //     'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:100px;'],
                            //     'format' => 'raw',
                            //     'value' => function ($model) {
                            //         return '<center>' . Html::img('@web/' . $model->dataBarang->foto_barang, ['style' => 'heigth: 50px; width:50px;', 'class' => 'img-xs']) . '</center>';
                            //     }
                            // ],
                            // [
                            //  'attribute'=>'data_barang_id',
                            //     'value'=>function($model){
                            //         return $model->dataBarang->supplier->username;
                            //     },
                            //     'label'=>'Admin'
                            // ],
                            
                            [
                                'attribute'=>'data_barang_id',
                                'value'=>function($model){
                                    return $model->dataBarang->nama_barang;
                                },
                                'label'=>'Nama Barang'],
                            [
                                'attribute'=>'data_barang_id',
                                'value'=>function($model){
                                    return $model->dataBarang->kode_barang;
                                },
                                'label'=>'Kode Barang'
                            ],
                            
                            'kode_pemesanan',
                            'waktu_pemesanan',
                            'jumlah',
                            //'total',
                            'status',
                            //'created_at',
                            //'updated_at',
                            //'metode',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}',
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
