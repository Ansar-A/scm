<?php

use common\models\DataBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\DataBarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Barangs';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
    $(document).on('click', '.btn-pesan-sekarang', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        
        // Open the modal
        $('#modal').modal('show').find('.modal-body').load(url);
    });

    $('#modal').on('submit', '#pemesanan-admin-form', function (e) {
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#modal').modal('hide');
                    location.reload(); // Reload the page to see changes
                } else {
                    // Handle validation errors
                    console.log(response.errors);
                }
            },
            error: function () {
                console.log('An error occurred.');
            }
        });
    });
JS
);

?>



<div class="container-fluid">
    

          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                  <h2 class="mr-40">Choose Supplier</h2>
                  <div class="select-style-2 mt-40">
                    <div class="select-position">
                      <select>
                        <option value="">Searh category</option>
                        <option value="">Category one</option>
                        <option value="">Category two</option>
                        <option value="">Category three</option>
                      </select>
                    </div>
                  </div>
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
                        Invoice
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>

    <div class="cards-styles">  

        <div class="data-barang-index">

           
           <!-- <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Create Data Barang', ['create'], ['class' => 'btn btn-success']) ?>
            </p> -->

            <div class="row">
                <?php foreach ($dataProvider->getModels() as $model): ?>

                    <div class="col-xl-6 col-lg-6">
                        <div class="card-style-5 mb-30">
                          <div class="card-image" style="margin-left: 20px;">
                            <a href="#0">
                               <?= Html::img('@web/' . $model->foto_barang, ['alt' => $model->nama_barang]) ?>
                            </a>
                          </div>
                          <div class="card-content">
                            <h4><a href="#0"><?= Html::encode($model->nama_barang) ?></a></h4>
                                <p>Harga: <?= Html::encode($model->harga_barang) ?></p>
                                <p>Stok: <?= Html::encode($model->stok_barang) ?></p>
                                <p>Supplier: <?= Html::encode($model->supplier->username) ?></p>
                                <p>Jenis Barang: <?= Html::encode($model->jenisBarang->nama) ?></p>
                                <p>Merek Barang: <?= Html::encode($model->merekBarang->nama) ?></p>
                           
                            <?= Html::a('Pesan', ['pemesanan-admin/create', 'data_barang_id' => $model->id], ['class' => 'main-btn primary-btn btn-hover']) ?>
                          </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header text-center">
                                <?= Html::encode($model->nama_barang) ?>
                            </div>
                            <div class="card-body text-center">
                                <?= Html::img('@web/' . $model->foto_barang, ['class' => 'card-img-top img-fluid img-rounded', 'alt' => $model->nama_barang, 'style' => 'max-height: 200px; width: auto;']) ?>
                                <p class="card-text mt-2"><strong>Harga:</strong> <?= Html::encode($model->harga_barang) ?></p>
                                <p class="card-text"><strong>Stok:</strong> <?= Html::encode($model->stok_barang) ?></p>
                                <p class="card-text"><strong>Supplier:</strong> <?= Html::encode($model->supplier->username) ?></p>
                                <p class="card-text"><strong>Jenis Barang:</strong> <?= Html::encode($model->jenisBarang->nama) ?></p>
                                <p class="card-text"><strong>Merek Barang:</strong> <?= Html::encode($model->merekBarang->nama) ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <?= Html::a('Pesan Sekarang', ['pemesanan-admin/create', 'data_barang_id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-pesan-sekarang']) ?>

                            </div>
                        </div>
                    </div> -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
