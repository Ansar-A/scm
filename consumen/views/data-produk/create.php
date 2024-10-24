<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DataProduk $model */

$this->title = 'Create Data Produk';
$this->params['breadcrumbs'][] = ['label' => 'Data Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-produk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data
    ]) ?>

</div>