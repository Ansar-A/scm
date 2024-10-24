<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DataBarang $model */

$this->title = 'Create Data Barang';
$this->params['breadcrumbs'][] = ['label' => 'Data Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-barang-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
