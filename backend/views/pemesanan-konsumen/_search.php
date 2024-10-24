<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PemesananvSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pemesanan-konsumen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'konsumen_id') ?>

    <?= $form->field($model, 'barang_masuk_id') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'harga_barang') ?>

    <?php // echo $form->field($model, 'kode_pemesanan') ?>

    <?php // echo $form->field($model, 'waktu_pemesanan') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
