<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Suppliers;
?>
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <?php $form = ActiveForm::begin(); ?>
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
                      <div class="form-group">
                        <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Merek Barang') ?>
                      </div>
                      
                      <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary me-2']) ?>
                            <a href="<?=Url::to(['merek-barang/index'])?>" class="btn btn-light">Cancel</a>
                           
                        </div>
                      
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
              </div>

</div>