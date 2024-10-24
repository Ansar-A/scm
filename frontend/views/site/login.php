<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <b>SCM</b> | Suply Chan Management
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="fw-light">Sign in to continue.</h6>
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'options'=>['class'=>'pt-3']]); ?>
                  <div class="form-group">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                  </div>
                  <div class="form-group">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                  </div>

                  <div class="mt-3 d-grid gap-2">
                    <?= Html::submitButton('SIGN IN', ['class' => 'btn btn-block btn-primary btn-lg fw-medium auth-form-btn', 'name' => 'login-button']) ?>
                  </div>
                 
                  <div class="text-center mt-4 fw-light"> Don't have an account? <a href="<?=Url::to(['signup'])?>" class="text-primary">Create</a>
                  </div>
                <?php ActiveForm::end(); ?>
              </div>
            </div>
          </div>
        </div>