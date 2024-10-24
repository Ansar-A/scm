<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10"><b>SCM</b> | Suply Chan Management</h1>
                    <h1 class="text-primary mb-10">Get Started</h1>
                    <p class="text-medium">
                      Start creating the best possible user experience
                      <br class="d-sm-block">
                      for you Admin.
                    </p>
                  </div>
                  <div class="cover-image">
                    <img src="<?=Url::to('@web/plain/assets/images/auth/signin-image.svg')?>" alt="">
                  </div>
                  <div class="shape-image">
                    <img src="<?=Url::to('@web/plain/assets/images/auth/shape.svg')?>" alt="">
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign Up Form</h6>
                  <p class="text-sm mb-25">
                    Start creating the best possible user experience for you
                    Admin.
                  </p>
                  <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="row">
                     <div class="col-md-6"> 
                        <div class="input-style-1">
                          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </div>
                     
                        <div class="input-style-1">
                          <?= $form->field($model, 'email') ?>
                        </div>
                     
                        <div class="input-style-1">
                          <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                     </div>
                     <div class="col-md-6"> 
                       <div class="input-style-1">
                          <?= $form->field($model, 'phone')->textInput(['type'=>'number']) ?>
                        </div>
                        <div class="input-style-1">
                          <?= $form->field($model, 'alamat') ?>
                        </div>
                     
                        <div class="input-style-1">
                          <?= $form->field($model, 'photo')->fileInput() ?>
                        </div>
                     </div>
                        
                      <!-- end col -->
                     <!--  <div class="col-12">
                        <div class="form-check checkbox-style mb-30">
                          <input class="form-check-input" type="checkbox" value="" id="checkbox-not-robot">
                          <label class="form-check-label" for="checkbox-not-robot">
                            I'm not robot</label>
                        </div>
                      </div> -->
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <?= Html::submitButton('SIGN UP', ['class' => 'main-btn primary-btn btn-hover w-100 text-center', 'name' => 'signup-button']) ?>
                      </div>
                        </div>
                      </div>

                      <div class="singup-option pt-40">
                   <!--  <p class="text-sm text-medium text-center text-gray">
                      Easy Sign Up With
                    </p>
                    <div class="button-group pt-40 pb-40 d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn-outline m-2">
                        <i class="lni lni-facebook-fill mr-10"></i>
                        Facebook
                      </button>
                      <button class="main-btn danger-btn-outline m-2">
                        <i class="lni lni-google mr-10"></i>
                        Google
                      </button>
                    </div> -->
                    <p class="text-sm text-medium text-dark text-center">
                      Already have an account? <a href="<?=Url::to(['login'])?>" class="text-primary">Sign In</a>
                    </p>
                  </div>
                    </div>
                    <!-- end row -->
                    
                   <?php ActiveForm::end(); ?>
                  
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>



