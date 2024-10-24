<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DataProdukSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="data-produk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'jenis_barang_id') ?>

    <?= $form->field($model, 'merek_barang_id') ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?php // echo $form->field($model, 'nama_barang') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'foto_barang') ?>

    <?php // echo $form->field($model, 'harga_barang') ?>

    <?php // echo $form->field($model, 'stok_barang') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
