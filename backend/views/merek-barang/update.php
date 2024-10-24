<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MerekBarang $model */

$this->title = 'Update Merek Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Merek Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="merek-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
