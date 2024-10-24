<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
use common\models\DataBarang;
use common\models\Suppliers;
use common\models\User;
use common\models\Pembayarans;
use common\models\PemesananAdmin;
$this->title = 'My Yii Application';
$this->registerCss("
    .no-underline {
        text-decoration: none;
        color: black; /* Ganti dengan warna yang diinginkan */
    }

    .no-underline:hover {
        color: gray; /* Warna ketika di-hover (opsional) */
    }
");

$akses = Yii::$app->user->identity->id;

$totalPemesanan = PemesananAdmin::find()
    ->joinWith(['dataBarang.supplier']) 
    ->where(['suppliers.id' => $akses]) 
    ->count();

$totalPembayaran = Pembayarans::find()
    ->joinWith(['pemesananAdmin.dataBarang.supplier']) 
    ->where(['suppliers.id' => $akses]) 
    ->count();

$totalSupplier = Suppliers::find()->count();
$totalAdmin = User::find()->count();

$totalBarang = DataBarang::find()
            ->joinWith(['supplier'])
            ->where(['supplier_id'=>$akses])
            ->count();
$totalSelesai = PemesananAdmin::find()
    ->joinWith(['dataBarang.supplier']) // Join dengan tabel suppliers melalui dataBarang
    ->where([
        'pemesanan_admin.status' => 'selesai', // Memfilter status yang selesai
        'suppliers.id' => $akses // Memfilter berdasarkan supplier yang login
    ])
    ->count();

$totalPembayaranSelesai = Pembayarans::find()
    ->joinWith(['pemesananAdmin.dataBarang.supplier']) // Join dengan tabel suppliers melalui dataBarang
    ->where([
        'pembayarans.status_brg' => 'Selesai', // Memfilter status yang selesai
        'suppliers.id' => $akses // Memfilter berdasarkan supplier yang login
    ])
    ->count();

?>
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">go To</a>
            </li>
            
        </ul>
        <div>
          <div class="btn-wrapper">
            <a href="<?=Url::to(['data-barang/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-floor-plan"></i> Data Barang</a>
            <a href="<?=Url::to(['pemesanan-admin/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-layers-outline"></i> Pemesanan</a>
            <a href="<?=Url::to(['pembayarans/index'])?>" class="btn btn-otline-dark"><i class="menu-icon mdi mdi-chart-line"></i> Pembayaran</a>
            <a href="<?=Url::to(['suppliers/index'])?>" class="btn btn-otline-dark"><i class="fa fa-user-circle"></i> Me</a>
        </div>
    </div>
</div>
<div class="tab-content tab-content-basic">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">




        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
              <div class="row">
                <div class="col-sm-12">
                  <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                      <p class="statistics-title">Total Pemesanan</p>
                      <h3 class="rate-percentage"><?php echo $totalPemesanan ?></h3>
                      <a href="<?=Url::to(['pemesanan-admin/index'])?>">
                        <div class="badge badge-opacity-info me-3">more</div>
                      </a>
                    </div>
                    <div>
                      <p class="statistics-title">Pemesanan Selesai</p>
                      <h3 class="rate-percentage"><?php echo $totalSelesai ?></h3>
                      <a href="<?=Url::to(['pemesanan-admin/index'])?>">
                        <div class="badge badge-opacity-info me-3">more</div>
                      </a>
                    </div>
                    <div>
                      <p class="statistics-title">Total Pembayaran</p>
                      <h3 class="rate-percentage"><?php echo $totalPembayaran ?></h3>
                      <a href="<?=Url::to(['pembayarans/index'])?>">
                        <div class="badge badge-opacity-info me-3">more</div>
                      </a>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Pembayaran Selesai</p>
                      <h3 class="rate-percentage"><?php echo $totalPembayaranSelesai ?></h3>
                      <a href="<?=Url::to(['pembayarans/index'])?>">
                        <div class="badge badge-opacity-info me-3">more</div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card card-rounded table-darkBGImg">
                    <div class="card-body">
                      <div class="col-sm-8">
                        <h3 class="text-white upgrade-info mb-0"> Supply <span class="fw-bold">Chain</span> Management </h3>
                        <h5 class="text-white mt-3">Yours Study Case</h5>
                        <a href="#" class="btn btn-info upgrade-btn">More Info!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 d-flex flex-column">
  <div class="row flex-grow">
    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
      <div class="card bg-primary card-rounded">
        <div class="card-body pb-0">
          <h4 class="card-title card-title-dash text-white mb-4">Data Barang</h4>
          <div class="row">
            <div class="col-sm-5">
              <p class="status-summary-ight-white mb-1">Total Barang</p>
              <h1 class="text-info"><?php echo $totalBarang ?></h1>
          </div>
          <div class="col-sm-7">
              <div class="status-summary-chart-wrapper pb-4">
                <canvas id="status-summary"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-12 grid-margin stretch-card">
  <div class="card card-rounded">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
            <div class="circle-progress-width">
              <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
          </div>
          <div>
              <p class="text-small mb-2">Supplier Web</p>
              <h4 class="mb-0 fw-bold"><?php echo $totalSupplier?></h4>
          </div>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="d-flex justify-content-between align-items-center">
        <div class="circle-progress-width">
          <div id="visitperday" class="progressbar-js-circle pr-2"></div>
      </div>
      <div>
          <p class="text-small mb-2">Admin Web</p>
          <h4 class="mb-0 fw-bold"><?php echo $totalAdmin ?></h4>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

 
      
   
      
</div>
</div>
</div>
</div>
</div>
</div>

