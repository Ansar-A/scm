<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <?php $form = ActiveForm::begin(); ?>
                      <div class="form-group">
                        <?= $form->field($model, 'status_brg')->dropDownList(['Validasi'=>'Validasi', 'Pengantaran'=>'Pengantaran', 'Selesai'=>'Selesai']) ?>
                      </div>
                      
                      
                      <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary me-2']) ?>
                            <a href="<?=Url::to(['pembayarans/index'])?>" class="btn btn-light">Cancel</a>
                        </div>
                      
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
              </div>

</div>

