<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\PembayaranKonsumen $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pembayaran-konsumen-view">

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
            'pemesanan_konsumen_id',
            'nama',
            'kode_pembayaran',
            'metode_pembayaran',
            'total',
            'tanggal',
            'gambar',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
