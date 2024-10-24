<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PemesananAdmin $model */

$this->title = 'Update Pemesanan Admin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-admin-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
