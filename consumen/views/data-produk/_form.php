<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\MerekProduk;
?>

<div class="data-produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(
            $data = User::find()->where(['id' => Yii::$app->user->identity->id])->all(),
            'id',
            
         'username',
        )) ?>
    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'jenis_barang_id')->dropDownList(['Pakaian'=>'Pakaian','Suvenir'=>'Suvenir','Aksessoris'=>'Aksesoris'],['prompt'=>'Pilih Jenis Produk ...']) ?>

    <?= $form->field($model, 'merek_barang_id')->dropDownList(ArrayHelper::map(
        $data = MerekProduk::find()->all(),
        'id',
        'merek',
    ),['prompt'=>'Pilih Merek Produk ...']) ?>

    <?= $form->field($model, 'kode_barang')->textInput(['readonly' => true]) ?>

    

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'foto_barang')->fileInput() ?>

    <?= $form->field($model, 'harga_barang')->textInput() ?>

    <?= $form->field($model, 'stok_barang')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
