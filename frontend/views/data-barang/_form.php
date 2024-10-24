<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Suppliers;
use common\models\JenisBarang;
use common\models\MerekBarang;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DataBarang $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="main-panel">
<div class="content-wrapper">
<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <?php $form = ActiveForm::begin(['options'=>['class'=>'forms-sample']]); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <?= $form->field($model, 'supplier_id')->dropDownList(
                                ArrayHelper::map(
                                    Suppliers::find()->where(['id' => Yii::$app->user->identity->id])->all(),
                                    'id',
                                    function($data) {
                                        return $data->username; 
                                    }
                                ),
                            ) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <?= $form->field($model, 'jenis_barang_id')->dropDownList(ArrayHelper::map(
                            $data = JenisBarang::find()->where(['supplier_id' => Yii::$app->user->identity->id])->all(),
                            'id',
                            function($data){
                                return $data->nama;
                            })) ?>
                          </div>
                        </div>
                    </div>
                      
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($model, 'merek_barang_id')->dropDownList(ArrayHelper::map(
                                $data = MerekBarang::find()->where(['supplier_id' => Yii::$app->user->identity->id])->all(),
                                'id',
                                function($data){
                                    return $data->nama;
                                })) ?>
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= $form->field($model, 'kode_barang')->textInput(['readonly' => true]) ?>
                              </div>
                        </div>
                    </div>

                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <?= $form->field($model, 'harga_barang')->textInput(['id' => 'harga-barang']) ?>
                            
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <?= $form->field($model, 'stok_barang')->textInput(['type'=>'number']) ?>
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>File upload</label>
                                <div class="input-group col-xs-12">
                                    <!-- Input teks yang disabled untuk menampilkan nama file -->
                                    <input id = "gambar-input" type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>

                                <!-- Input file Yii2 yang disembunyikan -->
                                <?= $form->field($model, 'foto_barang', [
                                    'template' => '{input}{error}', // Hanya menampilkan input dan error
                                ])->fileInput(['class' => 'file-upload-default', 'style' => 'display:none']) ?>
                            </div>

                            <?php
                            $this->registerJs(<<<JS
                                // Trigger input file saat tombol "Upload" diklik
                                $(document).on('click', '.file-upload-browse', function() {
                                    var file = $(this).parents('.form-group').find('.file-upload-default');
                                    file.trigger('click');
                                });

                                // Menampilkan nama file di input text ketika file dipilih
                                $(document).on('change', '.file-upload-default', function() {
                                    $(this).parents('.form-group').find('.file-upload-info').val($(this).val().replace(/C:\\\\fakepath\\\\/i, ''));
                                });
                            JS);
                            ?>

                        </div>
                    </div>
                      

                    <div class="form-group">
                            <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>
                    </div>

                      <!-- <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                      </div> -->
                      
                      <?= Html::submitButton('Save', ['class' => 'btn btn-primary me-2']) ?>
                      <a href="<?=Url::to(['data-barang/index'])?>" class="btn btn-light">Cancel</a>
                    
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
    </div>
