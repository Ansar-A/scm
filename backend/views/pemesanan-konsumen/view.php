<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\PemesananKonsumen $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="pemesanan-konsumen-view">
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
      <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'main-btn primary-btn btn-hover']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'main-btn danger-btn btn-hover',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <hr>
      <?= DetailView::widget([
        'model' => $model,
        'options'=>['class'=>'table'],
        'attributes' => [
            'barang_masuk_id',
            'kode_pemesanan',
            'waktu_pemesanan',
            'jumlah',
            'total',
            'status',
            
        ],
    ]) ?>
     <hr>
    <div class="form-group">
        
        <?= Html::a('Back', ['index'], ['class' => 'main-btn light-btn btn-hover']) ?>

    </div>

   
</div>
<!-- end card -->
</div>

</div>
</div>

