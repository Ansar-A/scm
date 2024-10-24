<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Suppliers $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tabel Data Supplier</h4>
                    <!-- <p class="card-description"> Add class <code>.table-bordered</code> -->
                    </p>
                    <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                     <?= Html::a('Back', ['index'], [
                        'class' => 'btn btn-dark',
                    ]) ?>
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <?= DetailView::widget([
                            'model' => $model,
                            'options'=>['class'=>'table'],
                            'attributes' => [
                                // 'id',
                                'kode_supplier',
                                'username',
                                'nomor_ponsel',
                                'email:email',
                                
                                // 'created_at',
                                // 'updated_at',
                                // 'verification_token',
                                [
                                  'attribute' => 'status',
                                  'format'=>'raw',
                                  'value' => function($model){
                                    if ($model->status == 10){
                                      return 'User Aktif';
                                    }else{
                                      return 'In Aktif';
                                    }
                                  }
                                ],
                                'alamat:ntext',
                                // 'password_hash',
                                // 'password_reset_token',
                                // 'auth_key',
                            ],
                        ]) ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

