<?php

use common\models\MerekBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\MerekBarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Merek Barangs';
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
        <a class="nav-link"  href="<?=Url::to(['jenis-barang/index'])?>" >Jenis</a>
        </li>
        <li class="nav-item" role="presentation">
        <a class="nav-link active" href="<?=Url::to(['merek-barang/index'])?>" >Merek</a>
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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="row pt-4">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="card-title">Table Data Merek Barang</h4>
                            <p class="card-description"> List Data Merek Barang Anda.
                            </p>
                        </div>
                        <div class="col-lg-4 text-end"><?= Html::a('<i class="fa fa-plus"></i> Add Merek', ['create'], ['class' => 'btn btn-success']) ?></div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'summary'=>false,
                        'tableOptions'=>['class'=>'table table-striped'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn', 'header'=>'No'],

                            // 'id',
                            'nama',
                            // 'created_at',
                            // 'updated_at',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}  {delete}',
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