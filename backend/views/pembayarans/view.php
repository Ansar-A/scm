<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Pembayarans $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Table Data Pebayaran</h2>
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
                        Pembayaran
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
            <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Data Pembayaran</h6>
                  <!-- <p class="text-sm mb-20">
                    For basic styling—light padding and only horizontal
                    dividers—use the class table.
                  </p> -->
                  <div class="table-wrapper table-responsive">
                  
                      <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class'=>'table'],
                        'attributes' => [
                            [
                                'attribute' => 'pemesanan_admin_id',
                                'label' => 'Nama Barang',
                                'value' => function($model){
                                    return $model->pemesananAdmin->dataBarang->nama_barang;
                                }
                            ],
                            [
                                'attribute' => 'pemesanan_admin_id',
                                'label' => 'Total Harga Barang',
                                'value' => function($model){
                                    return $model->pemesananAdmin->total;
                                }
                            ],
                            'kode_pembayaran',
                            'tanggal',
                            'status_brg',
                            'gambar',
                        ],
                    ]) ?>
                   
                  </div>
                  <p>
                        <?= Html::a('Back', ['index'], ['class' => 'main-btn deactive-btn btn-hover']) ?>
                        &nbsp;
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'main-btn danger-btn btn-hover',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                </div>
                <!-- end card -->
              </div>
          </div>
</div>


