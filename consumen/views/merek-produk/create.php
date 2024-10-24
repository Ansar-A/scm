<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MerekProduk $model */

$this->title = 'Create Merek Produk';
$this->params['breadcrumbs'][] = ['label' => 'Merek Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merek-produk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
