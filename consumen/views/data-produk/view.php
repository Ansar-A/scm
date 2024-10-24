<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\DataProduk $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <?= Html::a('<i class="lni lni-arrow-left"></i>', ['index'], ['class' => 'main-btn active-btn-light btn-hover']) ?>
                   <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'main-btn active-btn btn-hover ']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'main-btn danger-btn-outline btn-hover',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
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
                        View Tables Data Produk
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
                  <h6 class="mb-10">Data <?=Html::encode($model->nama_barang)?></h6>
                  <!-- <p class="text-sm mb-20">
                    For basic styling—light padding and only horizontal
                    dividers—use the class table.
                  </p> -->
                  <div class="table-wrapper table-responsive">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options'=>['class'=>'table'],
                        'attributes' => [
                            // 'id',
                            [
                            'attribute'=>'user_id',
                            'label' => 'Nama Admin',
                            'value'=>function($model){
                              return $model->user->username;
                            }],
                            'nama_barang',
                            [
                            'attribute'=>'jenis_barang_id',
                            'label' => 'Jenis',
                            ],
                            [
                            'attribute'=>'merek_barang_id',
                            'label' => 'Merek',
                            'value'=>function($model){
                              return $model->merekProduk->merek;
                            }],
                            'kode_barang',
                            'deskripsi',
                            'foto_barang',
                            'harga_barang',
                            'stok_barang',
                            // 'created_at',
                            // 'updated_at',
                        ],
                    ]) ?>
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>


