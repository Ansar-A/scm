    <?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use common\models\Suppliers;
    use common\models\DataBarang;
    use yii\helpers\Url;
    /** @var yii\web\View $this */
    /** @var common\models\PemesananAdmin $model */
    /** @var yii\widgets\ActiveForm $form */
    // var_dump($model->getErrors());
    ?>

    <div class="container-fluid">
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title">
              <h2>Halaman Pemesanan Konsumen</h2>
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
            <li class="breadcrumb-item"><a href="#0">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Form Elements
            </li>
        </ol>
    </nav>
    </div>
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
    </div>
    <div class="invoice-card card-style mb-30">
        <div class="invoice-header">
          <div class="invoice-for">
            <h2 class="mb-10">Pemesanan</h2>
            <p class="text-sm">
              Lakukan Pemesanan dengan Cermat &amp; Teliti
          </p>
      </div>
      <div class="invoice-logo">
        <img src="assets/images/invoice/uideck-logo.svg" alt="">
    </div>
    <div class="invoice-date">
        <p><span>Hari Ini:</span> <?php echo strftime("%d %B %Y", time()); ?> </p>
    </div>
    </div>
    <div class="invoice-address">
      <div class="address-item">
        <h5 class="text-bold">From Admin</h5>
        <?php if ($model->dataProduk && $model->dataProduk->user): ?>
            <h1><?= $model->dataProduk->user->username ?></h1>
        <?php else: ?>
            <p>Data produk atau pengguna tidak ditemukan.</p>
        <?php endif; ?>        
        <p class="text-sm">
          <?= $model->dataProduk->user->alamat ?>
      </p>
      <p class="text-sm">
          <span class="text-medium">Email:</span>
          <?= $model->dataProduk->user->email ?>
      </p>
    </div>
    <div class="address-item">
        <h5 class="text-bold">To Me</h5>
        <h1><?= Yii::$app->user->identity->username ?></h1>
        <p class="text-sm">
          <?= $model->dataProduk->user->alamat ?>
      </p>
      <p class="text-sm">
          <span class="text-medium">Email:</span>
          <?= Yii::$app->user->identity->email ?>
      </p>
    </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="table-responsive">
      <table class="invoice-table table">
        <thead>
          <tr>
            <th class="service">
              <h6 class="text-sm text-medium">Supplier</h6>
          </th>

          <th class="desc">
              <h6 class="text-sm text-medium">Nama Barang</h6>
          </th>
          <th class="desc">
              <h6 class="text-sm text-medium">Jenis Barang</h6>
          </th>
          <th class="desc">
              <h6 class="text-sm text-medium">Kode Barang</h6>
          </th>
          <th class="qty">
              <h6 class="text-sm text-medium">Harga</h6>
          </th>
          <th class="qty">
              <h6 class="text-sm text-medium">Stok Barang</h6>
          </th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <p class="text-sm">
           <?= $model->dataProduk->user->username ?>
        </p>
    </td>

    <td>
      <p class="text-sm">
        <p class="text-sm"><?= $model->dataProduk->nama_barang ?></p>
    </p>
    </td>
    <td>
      <p class="text-sm">
        <?= $model->dataProduk->jenis_barang_id ?>

    </td>
    <td>
      <p class="text-sm">
       <?= $model->dataProduk->kode_barang ?>

    </p>
    </td>
    <td>
      <p class="text-sm">
       <p class="text-sm"><?= $model->dataProduk->harga_barang ?></p>
    </p>
    </td>
    <td>
      <p class="text-sm">
       <?= $model->dataProduk->stok_barang ?>

    </p>
    </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <h6 class="text-sm text-medium">Tanggal Pemesanan</h6>
      </td>
      <td>

          <?= $form->field($model, 'waktu_pemesanan', ['template' => '{input}'])->textInput([
            'type' => 'date',
            'value' => date('Y-m-d')
        ]) ?>

    </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <h6 class="text-sm text-medium">Metode Pembayaran</h6>
      </td>
      <td>

       <?= $form->field($model, 'metode', ['template' => '{input}'])->dropDownList([
        'Transfer' => 'Transfer',
        'Tunai' => 'Tunai',
    ], [
        'prompt' => 'Pilih Metode . . .',
        'style' => 'font-size: 13px;', 
                    // Perbaikan: Properti 'style' ditaruh di level root array, bukan dalam 'options'
    ]) ?>

    </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <h6 class="text-sm text-medium">Input Jumlah Pesanan</h6>
      </td>
      <td>

          <?= $form->field($model, 'jumlah', ['template' => '{input}'])->textInput([
            'type' => 'number',
            'style' => 'width:75px;',
            'id' => 'pemesananadmin-jumlah',
        ]) ?>

    </td>
    </tr>

    <tr>
        <td></td></td>
        <td></td><td></td><td></td>
        <td>
          <h6 class="text-sm text-medium">Discount</h6>
      </td>
      <td>
          <h6 class="text-sm text-bold">0%</h6>
      </td>
    </tr>
    <tr>
        <td></td>
        <td></td><td></td><td></td>
        <td>
          <h6 class="text-sm text-medium">Biaya Pengantaran</h6>
      </td>
      <td>
          <h6 class="text-sm text-bold">Free</h6>
      </td>
    </tr>
    <tr>
        <td></td>
        <td></td><td></td><td></td>
        <td>
          <h5>Total</h5>
      </td>
      <td>
        <h5 id="total"><?= isset($model->total) ? number_format($model->total, 0, ',', '.') : '0'; ?></h5>               
    </td>
    </tr>

    <!-- Jumlah Pesanan Tidak Boleh Melebihi Stok -->
    <!-- JavaScript untuk perhitungan total -->
    <script>
                              // Ensure that harga_barang is properly set in the backend
                              var harga_barang = <?= isset($data) ? $data->harga_barang : '0' ?>;

                              // Function to format numbers as currency
                              function formatCurrency(amount) {
                                  // Format the number as currency with "Rp." and thousand separators
                                  return 'Rp. ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".").replace(/\B(?=(\d{3})+(?!\.))/g, "."); 
                              }

                              // Attach the input event listener after the DOM is loaded
                              document.addEventListener('DOMContentLoaded', function() {
                                  document.getElementById('pemesananadmin-jumlah').addEventListener('input', function() {
                                      var jumlah = this.value;
                                      var total = jumlah * harga_barang;
                                      document.getElementById('total').innerText = formatCurrency(total); // Update total value in the page
                                  });
                              });
                          </script>


                          <!-- stok berdasarkan data barang bersangkutan -->
                          <script>
                            document.getElementById('pemesananadmin-jumlah').addEventListener('input', function() {
                              var jumlah = parseInt(this.value);
                                    var stok = <?= $data ? $data->stok_barang : 0 ?>; // Get stok_barang from PHP

                                    if (jumlah > stok) {
                                      alert('Jumlah pesanan tidak boleh melebihi stok barang!');
                                        this.value = stok; // Reset to maximum allowed value
                                    }
                                });
                            </script>

                        </tbody>
                    </table>
                </div>
                <div class="note-wrapper warning-alert py-4 px-sm-3 px-lg-5">
                  <div class="alert">
                    <h5 class="text-bold mb-15">Notes:</h5>
                    <p class="text-sm text-gray">
                      Masukkan Jumlah Pesanan Anda, Jika Jumlah Pesanan Melebihi Stok Lakukan Pemesanan Ulang
                  </p>
              </div>
          </div>
          <div class="invoice-action">
              <ul class="d-flex flex-wrap align-items-center justify-content-center">
                <li class="m-2">
                  <a href="<?=Url::to(['index'])?>" class="main-btn primary-btn-outline btn-hover">
                    Batalkan
                </a>
            </li>
            <li class="m-2">
              <?= Html::submitButton('Pesan', ['class' => 'main-btn primary-btn btn-hover']) ?>
          </li>
      </ul>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
    </div>

