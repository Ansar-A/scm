<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Suppliers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="suppliers-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
     <?= $form->field($model, 'kode_supplier')->textInput(['readonly' => true]) ?>
     <?= $form->field($model, 'nomor_ponsel')->textInput([
                                'type' => 'tel',
                                'pattern' => '[0-9]{10,15}',
                                'maxlength' => 15,
                                'placeholder' => 'Enter phone number'
                            ]) ?>
    <?= $form->field($model, 'alamat')->textInput([]) ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
