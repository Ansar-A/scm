<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DataBarang $model */

$this->title = 'Update Data Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-barang-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
