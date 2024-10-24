<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pembayarans $model */

$this->title = 'Create Pembayarans';
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayarans-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
