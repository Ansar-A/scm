<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Suppliers;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <b>SCM</b> | Supply Chain Management
                </div>
                <h4>New here?</h4>
                <h6 class="fw-light">Signing up is easy. It only takes a few steps</h6>
                <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['class' => 'pt-3']]); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'kode_supplier')->textInput(['readonly' => true]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'nomor_ponsel')->textInput([
                                'type' => 'tel',
                                'pattern' => '[0-9]{10,15}',
                                'maxlength' => 15,
                                'placeholder' => 'Enter phone number'
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'alamat')->textInput([]) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'email') ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?= $form->field($model, 'photo')->fileInput() ?>
                        </div>
                    </div>
                </div>

                <!-- <div class="mb-4">
                    <div class="form-check">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" id="terms-checkbox" class="form-check-input"> I agree to all Terms &amp; Conditions
                            <i class="input-helper"></i>
                        </label>
                    </div>
                </div> -->
                <div class="mt-3 d-grid gap-2">
                    <?= Html::submitButton('SIGN UP', [
                        'class' => 'btn btn-block btn-primary btn-lg fw-medium auth-form-btn',
                        'name' => 'signup-button',
                        
                    ]) ?>
                </div>
                <div class="text-center mt-4 fw-light"> Already have an account? <a href="<?= Url::to(['login']) ?>" class="text-primary">Login</a></div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>





