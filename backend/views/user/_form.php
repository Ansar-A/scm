<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>



<div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Form Supplier</h2>
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
                      <li class="breadcrumb-item"><a href="#0">Supplier</a></li>
                      
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
                  <div class="input-style-1">
                     <?= $form->field($model, 'status')->dropDownList([
                        10 => 'Aktif', 9 => 'Non Aktif',
                    ]) ?>
                  </div>
                                   <!-- end input -->
                  <div class="input-style-3">
                    <a href="<?=Url::to(['user/index'])?>" class="main-btn light-btn btn-hover">Back</a>
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