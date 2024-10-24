<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\JenisBarang $model */

$this->title = 'Create Jenis Barang';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-barang-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
