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
<div class="pemesanan-konsumen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'konsumen_id',
            'barang_masuk_id',
            'nama_barang',
            'harga_barang',
            'kode_pemesanan',
            'waktu_pemesanan',
            'jumlah',
            'total',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
