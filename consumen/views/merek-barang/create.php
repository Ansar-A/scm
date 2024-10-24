<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MerekBarang $model */

$this->title = 'Create Merek Barang';
$this->params['breadcrumbs'][] = ['label' => 'Merek Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merek-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
