<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Konsumens $model */

$this->title = 'Update Konsumens: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="konsumens-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
