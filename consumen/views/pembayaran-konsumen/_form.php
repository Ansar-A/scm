<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\PemesananKonsumen;
?>

<div class="container-fluid">
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title">
              <h2>Halaman Pembayaran</h2>
          </div>
      </div>
      <div class="col-md-6">
        <div class="breadcrumb-wrapper">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#0">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="#0">Data Pembayaran</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Update Pembayaran
            </li>
        </ol>
    </nav>
</div>
</div>
</div>
</div>


<div class="form-elements-wrapper">
    <div class="row">
   
      <div class="col-lg-8">

         <?php $form = ActiveForm::begin(['options'=>['class'=>'card-style mb-30']]); ?>
        <div class="">
            <div class="alert-box gray-alert pl-100">
                  <div class="left">
                    <h5 class="text-bold">Kode <?= $model->pemesananKonsumen->kode_pemesanan ?></h5>
                  </div>
                  <div class="alert">
                    <h4 class="alert-heading">Kode Barang: <?= $model->pemesananKonsumen->dataProduk->kode_barang ?></h4>
                    <p class="text-medium">
                      <?= $model->pemesananKonsumen->dataProduk->nama_barang ?>
                    </p>
                  </div>
                </div>

      <div class="input-style-1">
            <?= $form->field($model, 'pemesanan_konsumen_id')->dropDownList(
            ArrayHelper::map(PemesananKonsumen::find()->all(), 'id', 'kode_pemesanan'),
            [
                'disabled' => true,
                'onchange' => '
                $.post("' . Url::to(['pembayaran-konsumen/get-kode-pemesanan']) . '&id=" + $(this).val(), function(data) {
                    $("#kode-pemesanan-display").val(data); 
                    });
                    '
                ]
            ) ?>
            </div> 
        <!-- end input -->
        <div class="input-style-2">
            <?= $form->field($model, 'kode_pembayaran')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>
        <!-- end input -->
        <div class="input-style-3">
            <?= $form->field($model, 'tanggal')->textInput(['type' => 'date'])->label('Tanggal Pembayaran') ?>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="input-style-1">
                <label>Upload Gambar</label>
                <?= $form->field($model, 'gambar')->fileInput(['class' => 'form-control', 'id' => 'gambar-input'])->label(false) ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-style-1">
                    <label>Preview Gambar</label>
                    <div class="card-style-1" style="width: 100%; height: auto; max-width: 300px;"> <!-- Tentukan ukuran card -->
                        <img class="card-image" id="gambar-preview" src="#" alt="Preview Gambar" style="width: 100%; height: auto; display: none;" />
                    </div>
                </div>
                 <?php
                    $this->registerJs("
                        document.getElementById('gambar-input').onchange = function (evt) {
                            var file = evt.target.files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    document.getElementById('gambar-preview').src = e.target.result;
                                    document.getElementById('gambar-preview').style.display = 'block';
                                };
                                reader.readAsDataURL(file);
                            }
                        };
                    ");
                    ?>
            </div>
        </div>
            
        </div>

        <div class="input-style-5 pt-20 text-center">
            <a href="<?=Url::to(['pemesanan-konsumen/index'])?>" class="main-btn light-btn-outline btn-hover">Kembali</a>
            <?= Html::submitButton('Simpan', ['class' => 'main-btn active-btn btn-hover']) ?>
        </div>
        <?php ActiveForm::end(); ?>
        </div>
    
<div class="col-lg-4">
    <div class="card-style mb-30">
        <h6 class="mb-25">Foto Barang</h6>
        <div class="input-style-1">
            <img src="<?= Yii::getAlias('@web') . '/' . $model->pemesananKonsumen->dataProduk->foto_barang ?>" 
                 alt="Foto Barang" 
                 style="max-width: 100%; height: auto;" />
        </div>
    </div>

</div>

</div>

</div>

</div>

</div>

</div>




