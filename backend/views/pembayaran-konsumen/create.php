<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PembayaranKonsumen $model */

$this->title = 'Create Pembayaran Konsumen';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-konsumen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
