<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PemesananKonsumen $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="container-fluid">
    <div class="pemesanan-konsumen-form">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Update Status Pemesanan Konsumen</h2>
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
                    Pemesanan Konsumen
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- end col -->
</div>
<!-- end row -->
</div>

<div class="col-lg-12">
    <div class="card-style mb-30">
      <h5 class="text-medium mb-25">Form Status</h5>
      <?php $form = ActiveForm::begin(); ?>
      <div class="input-style-1">
        <?= $form->field($model, 'status')->dropDownList([ 'selesai' => 'Selesai', 'proses' => 'Proses', 'gagal' => 'Gagal', ], ['prompt' => '']) ?>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'main-btn success-btn btn-hover']) ?>
        &nbsp;
        <?= Html::a('Back', ['index'], ['class' => 'main-btn light-btn btn-hover']) ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>
<!-- end card -->
</div>

</div>
</div>
