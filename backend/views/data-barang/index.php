<?php

use common\models\DataBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

$this->title = 'Data Barangs';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/custom.css");
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
                    
                    <div class="d-flex">
                        <div class="select-style-2 mt-0 mr-2">
                            <div class="select-position">
                                <?= Html::beginForm(['data-barang/index'], 'get', ['id' => 'filter-form']) ?>
                                
                                <!-- Dropdown for choosing supplier -->
                                <?= Html::dropDownList('user', $selectedUser, $userList, [
                                    'prompt' => 'Choose Produsen',
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
                                Data Barang
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
            <div class="row">
                <?php foreach ($dataProvider->getModels() as $model): ?>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card-style-5 mb-30" style="border-radius: 15px;">
                          <div class="card-image" style="margin-left: 20px;">
                            <a href="<?=Url::to(['data-barang/view', 'id' => $model->id])?>">
                               <?= Html::img('@web/' . $model->foto_barang, [
                                    'alt' => $model->nama_barang,
                                    'style' => 'width: 150px; height: 200px; object-fit: cover; border-radius:8px;',
                                ]) ?>
                            </a>
                          </div>
                          <div class="card-content">
                            <h4>
                                <a href="#0"><?= Html::encode($model->nama_barang) ?></a>
                            </h4>
                            <p style="font-size:12px; height: 75px;">
                                <?=Html::encode($model->deskripsi)?>
                            </p>
                            <div class="row" style="padding-top: 5px;">
                                <div class="col-md-6" style="padding-top:2px;">
                                    <h6>Rp <?= Html::encode(number_format($model->harga_barang, 0, ',', '.')) ?></h6>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-size:12px;">Stok: <?= Html::encode($model->stok_barang) ?></p>
                                </div>
                            </div>
                                
                                
                                
                            <?= Html::a('<i class="lni lni-cart"></i>', ['pemesanan-admin/create', 'data_barang_id' => $model->id], ['class' => 'main-btn primary-btn btn-hover btn-sm']) ?>
                            <?= Html::a('<i class="lni lni-eye"></i>', ['data-barang/view', 'id' => $model->id], ['class' => 'main-btn primary-btn btn-hover btn-sm']) ?>
                          </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagination-container">
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'options' => ['class' => 'pagination justify-content-center'], // Bootstrap styling
                    'linkOptions' => ['class' => 'page-link'], // Bootstrap link class
                    'prevPageCssClass' => 'page-item',  // Class for previous button
                    'nextPageCssClass' => 'page-item',  // Class for next button
                    'activePageCssClass' => 'active',   // Class for active page
                    'disabledPageCssClass' => 'disabled', // Class for disabled buttons
                    'pageCssClass' => 'page-item',       // Class for each page button
                ]); ?>
            </div>
        </div>
    </div>
</div>
