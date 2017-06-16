<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;



$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .contact-form{
        background-color:#808ca0;
        padding:15px;
        border-radius:10px;
    }    
</style>

<div class="site-contact">
<div class="container" style="padding-right:10px">
    <div class="heading">
    <center>
        <h2><b><?= Html::encode($this->title) ?></b></h2>
    </center>
    </div>
    <br/>

    <div class="contact-form" style="padding-right: 10px">
        <b>
        <p>
        If you have any complaints or suggestions, feel free to write to us using the contact form below.
        </p>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6" style="padding-top:10px">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </b>
    </div>
    <br/>

</div>
</div>
