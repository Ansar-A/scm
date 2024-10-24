<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PemesananAdmin $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pemesanan-admin-form">

    <?php $form = ActiveForm::begin([
        'options' => ['id' => 'pemesanan-admin-form'],
        'action' => ['pemesanan-admin/create'], // or appropriate action
    ]); ?>

    <?= $form->field($model, 'supplier_id')->hiddenInput(['value' => $model->supplier_id])->label(false) ?>

    <?= $form->field($model, 'data_barang_id')->hiddenInput(['value' => $model->data_barang_id])->label(false) ?>

    <?= $form->field($model, 'kode_pemesanan')->textInput() ?>

    <?= $form->field($model, 'waktu_pemesanan')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        'Pending' => 'Pending',
        'Completed' => 'Completed',
        'Cancelled' => 'Cancelled',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
