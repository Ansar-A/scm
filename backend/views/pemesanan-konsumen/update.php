<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PemesananKonsumen $model */

$this->title = 'Update Pemesanan Konsumen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-konsumen-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
