<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Konsumens $model */

$this->title = 'Create Konsumens';
$this->params['breadcrumbs'][] = ['label' => 'Konsumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konsumens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
