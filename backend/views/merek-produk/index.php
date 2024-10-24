<?php

use common\models\MerekProduk;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MerekProdukSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Merek Produks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Halaman Merek Produk</h2>
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
                        Data Merek
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>

          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="row">
                        <div class="col-lg-6">
                              <h6 class="mb-10">Data Merek Produk</h6>
                              <p class="text-sm mb-20">
                                Berikut Merupakan Data Merek Produk Anda.
                              </p>
                        </div>
                        <div class="col-lg-6 text-end">
                            <?= Html::a('Create Merek', ['create'], ['class' => 'main-btn success-btn btn-hover']) ?>
                            <a href="<?=Url::to(['data-produk/index'])?>" class="main-btn light-btn-outline square-btn btn-hover">To Produk</a>
                        </div>
                    </div>
                  <div class="table-wrapper table-responsive">

                    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'tableOptions' => ['class'=>'table'],
                    'summary' => false,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn', 'header'=>'No',
                            'contentOptions' => ['style' => 'text-align:center; width:60px;'],
                            'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center; width:80px;'],
                        ],
                        
                        'merek',
                        
                        [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}  {delete}',
                        'header' => 'Action',
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
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
                ]); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

</div>