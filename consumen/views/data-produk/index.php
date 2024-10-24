<?php

use common\models\DataProduk;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\DataProdukSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Produks';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap">
                    <!-- <h2 class="mr-40">Choose Supplier</h2> -->
                    <div class="d-flex">
                        <div class="select-style-2 mt-0 mr-2">
                            <div class="select-position">
                                <?= Html::beginForm(['data-produk/index'], 'get', ['id' => 'filter-form']) ?>
                                
                                <!-- Dropdown for choosing supplier -->
                                <?= Html::dropDownList('supplier', $selectedUser, $userList, [
                                    'prompt' => 'Choose Supplier',
                                    'class' => 'form-control',
                                    'onchange' => 'document.getElementById("filter-form").submit()' 
                                ]) ?>
                            </div>
                        </div>
                        &nbsp;
                        <div class="select-style-2 mt-0">
                            <div class="select-position">
                                <!-- Dropdown for choosing page size -->
                                <?= Html::dropDownList('per-page', $selectedPageSize, [
                                    2 => '2 items',
                                    5 => '5 items',
                                    10 => '10 items',
                                    20 => '20 items',
                                    50 => '50 items'
                                ], [
                                    'class' => 'form-control',
                                    'onchange' => 'document.getElementById("filter-form").submit()' // auto submit form when changed
                                ]) ?>
                            </div>
                        </div>

                        <?= Html::endForm() ?>
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
                                Data Produk
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
        <div class="data-produk-index">
            <div class="row">
                <?php foreach ($dataProvider->getModels() as $model): ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-1 mb-30">
                          <div class="card-meta">
                            <div class="image">
                              <img src="<?=Url::to('@web/' . $model->user->photo)?>" alt="">
                            </div>
                            <div class="text">
                              <p class="text-sm text-medium">
                                Posted by : <a href="#0"><?= Html::encode($model->user->username) ?></a>
                              </p>
                            </div>
                          </div>
                          <div class="card-image">
                            <a href="#0">
                              <?= Html::img('@web/' . $model->foto_barang, ['alt' => $model->nama_barang]) ?>
                            </a>
                          </div>
                          <div class="card-content">
                            <h4><a href="#0"> Keterangan Produk </a></h4>
                                <p><?= Html::encode($model->nama_barang) ?></p>
                                <p>Rp <?= Html::encode(number_format($model->harga_barang, 0, ',', '.')) ?></p>
                                <hr>
                                <div class="text-center">
                                    <?= Html::a('<i class="lni lni-cart"></i>', ['pemesanan-konsumen/create', 'barang_masuk_id' => $model->id], ['class' => 'main-btn primary-btn btn-hover btn-sm']) ?>
                                    <?= Html::a('<i class="lni lni-eye"></i>', ['data-produk/view', 'id' => $model->id], ['class' => 'main-btn primary-btn btn-hover btn-sm']) ?>
                                </div>
                          </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
