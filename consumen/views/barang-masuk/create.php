<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\BarangMasuk $model */

$this->title = 'Create Barang Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Barang Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
