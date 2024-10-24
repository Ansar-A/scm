<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pembayarans $model */

$this->title = 'Update Pembayarans: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayarans-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
