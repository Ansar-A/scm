<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DetailPemesananAdmin $model */

$this->title = 'Create Detail Pemesanan Admin';
$this->params['breadcrumbs'][] = ['label' => 'Detail Pemesanan Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-pemesanan-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
