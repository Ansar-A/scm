<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MerekProduk $model */

$this->title = 'Update Merek Produk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Merek Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="merek-produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
