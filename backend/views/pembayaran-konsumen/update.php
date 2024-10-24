<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PembayaranKonsumen $model */

$this->title = 'Update Pembayaran Konsumen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-konsumen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
