<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\MerekProduk;

?>

<div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Form Data Produk</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#0">Produk</a></li>
                      
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== form-elements-wrapper start ========== -->
          <div class="form-elements-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Input Fields</h6>
                   <?php $form = ActiveForm::begin(); ?>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'user_id')->dropDownList(
                                    ArrayHelper::map(
                                        $data = User::find()->where(['id' => Yii::$app->user->identity->id])->all(),
                                        'id',
                                        
                                     'username',
                                    )) ?>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'jenis_barang_id')->dropDownList(['Pakaian'=>'Pakaian','Suvenir'=>'Suvenir','Aksessoris'=>'Aksesoris'],['prompt'=>'Pilih Jenis Produk ...']) ?>
                              </div>
                        </div>
                         <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'merek_barang_id')->dropDownList(ArrayHelper::map(
                                    $data = MerekProduk::find()->where(['id'=>Yii::$app->user->identity->id])->all(),
                                    'id',
                                    'merek',
                                ),['prompt'=>'Pilih Merek Produk ...']) ?>
                              </div>
                        </div>
                         <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'kode_barang')->textInput(['readonly' => true]) ?>
                              </div>
                        </div>
                        
                         <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'foto_barang')->fileInput() ?>
                              </div>
                        </div>
                         <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'harga_barang')->textInput() ?>
                              </div>
                        </div>
                         <div class="col-md-6">
                            <div class="input-style-1">
                                <?= $form->field($model, 'stok_barang')->textInput(['type'=>'number']) ?>
                              </div>
                        </div>
                         <div class="col-md-12">
                            <div class="input-style-1">
                                 <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>
                              </div>
                        </div>
                   </div>
                  
                                  
                  <div class="input-style-3">
                    <a href="<?=Url::to(['data-produk/index'])?>" class="main-btn light-btn btn-hover">Back</a>
                    &nbsp;
                    <?= Html::submitButton('Save', ['class' => 'main-btn primary-btn btn-hover']) ?>
                  </div>
                  <!-- end input -->

                  <?php ActiveForm::end(); ?>
                </div>
                
              </div>
              
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>


