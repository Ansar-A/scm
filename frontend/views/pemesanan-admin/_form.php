<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
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
                   
                            <div class="form-group">
                             <?= $form->field($model, 'status')->dropDownList([ 'selesai' => 'Selesai', 'proses' => 'Proses', 'gagal' => 'Gagal', ], ['prompt' => '']) ?>
                          </div>
                        
                      
                      <?= Html::submitButton('Save', ['class' => 'btn btn-primary me-2']) ?>
                      <a href="<?=Url::to(['pemesanan-admin/index'])?>" class="btn btn-light">Cancel</a>
                    
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
    </div>


