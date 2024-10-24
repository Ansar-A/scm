<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\PemesananAdmin $model */

$this->title = 'Create Pemesanan Admin';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-admin-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    
    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
    ]) ?>

</div>
