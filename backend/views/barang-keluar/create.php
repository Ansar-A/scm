<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\BarangKeluar $model */

$this->title = 'Create Barang Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Barang Keluars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-keluar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
