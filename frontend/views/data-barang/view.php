<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\DataBarang $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="content-wrapper">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h4 class="card-title card-title-dash">View Data Barang</h4>
                                    <div class="form-group">
                                      <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                      <a href="<?=Url::to(['index'])?>" class="btn btn-light"><i class="mdi mdi-arrow-left ms-2"></i> Back</a>
                                      <a href="<?=Url::to(['pembayarans/index'])?>" class="btn btn-light"><i class="mdi mdi-arrow-left ms-2"></i> Back to Pembayaran</a>
                                    </div>
                                  
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-md-7">
                                      <ul class="bullet-line-list">
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Nama Barang : <?=Html::encode($model->nama_barang)?></div>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div>Supplier : <?=Html::encode($model->supplier->username)?></div>
                                        
                                      </div>
                                    </li>
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Jenis Barang : <?=Html::encode($model->jenisBarang->nama)?></div>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Merek Barang : <?=Html::encode($model->merekBarang->nama)?></div>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Kode Barang : <?=Html::encode($model->kode_barang)?></div>
                                      </div>
                                    </li>
                                    
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Stok Barang : <?=Html::encode($model->stok_barang)?></div>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Harga Barang : <?=Html::encode($model->harga_barang)?></div>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="d-flex justify-content-between">
                                        <div><span class="text-light-green">Deskripsi : <?=Html::encode($model->deskripsi)?></div>
                                      </div>
                                    </li>
                                  </ul>
                                    </div>
                                    <div class="col-md-5">
                                      <?= Html::img('@web/' . $model->foto_barang, [
                                            'style' => 'max-width: 50%; height: auto;', 
                                            'class' => 'image', 
                                            'alt' => 'Foto Barang'
                                        ]) ?>
                                    </div>
                                  </div>
                                    
                                </div>
                                    
                                  </div>
                                
                             
                            </div>
                            </div>






