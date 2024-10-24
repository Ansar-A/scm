<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PemesananKonsumen $model */

$this->title = 'Create Pemesanan Konsumen';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-konsumen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
