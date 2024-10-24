<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\PemesananAdminSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pemesanan-admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="row">
    <div class="col-lg-8">
    
        <?= $form->field($model, 'globalSearch')->textInput(['placeholder' => 'Search...'])->label(false) ?>
 
</div>
    <div class="col-lg-4">
        <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-primary', 'style'=>"width:185px;"]) ?>
        <?= Html::a('<i class="fa fa-refresh"></i>', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    </div>
</div>
    

    <?php ActiveForm::end(); ?>

</div>
