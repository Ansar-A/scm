<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\BarangKeluar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="barang-keluar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'konsumen_id')->textInput() ?>

    <?= $form->field($model, 'barang_masuk_id')->textInput() ?>

    <?= $form->field($model, 'kode_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_keluar')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'perjalanan' => 'Perjalanan', 'sampai' => 'Sampai', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
