<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PembayaranKonsumen $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pembayaran-konsumen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pemesanan_konsumen_id')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pembayaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metode_pembayaran')->dropDownList([ 'transfer' => 'Transfer', 'tunai' => 'Tunai', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'selesai' => 'Selesai', 'proses' => 'Proses', 'gagal' => 'Gagal', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
