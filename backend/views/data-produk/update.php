<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DataProduk $model */

$this->title = 'Update Data Produk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-produk-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
