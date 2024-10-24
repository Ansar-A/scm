<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PemesananKonsumen $model */

$this->title = 'Create Pemesanan Konsumen';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-konsumen-create">
    <?= $this->render('_form', [
        'model' => $model,
        'data'=> $data,
        
        'dueDate' => $dueDate,
    ]) ?>

</div>
