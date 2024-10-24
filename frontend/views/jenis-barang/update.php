<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\JenisBarang $model */

$this->title = 'Update Jenis Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-barang-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
