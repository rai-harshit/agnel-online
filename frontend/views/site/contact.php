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
        background-color: #ff9f1c;
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

            <div class="nav nav-pills" style="padding-bottom:3px">
                    <li class="pull-right">
                        <a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#contact_us') ?>" style=" color:#ff9f1c; background-color: black">HELP</a>
                    </li>
            </div>

        <b>
        <p>
        If you have any complaints or suggestions, feel free to write to us using the contact form below.
        </p>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']);
                $loggedin = isset(Yii::$app->user->identity);
                //print_r(Yii::$app->user->identity);
                if ($loggedin == 1 ){
                $user_name = Yii::$app->user->identity->name;
                //echo ($user_name);
                $email = Yii::$app->user->identity->email;
                //echo ($email);
                }
            ?>

                <!--<?= $form->field($model, 'name')->textInput(['autofocus' => true, 'bgcolor' => 'green']) ?>
-->

                <?php 
                if($loggedin == 1){
                    echo($form->field($model, 'name')->textInput(['readonly' => TRUE ,'value' => $user_name,'style'=>'background-color:black']));
                }
                else{
                    echo($form->field($model, 'name'));
                }
                ?>


                <?php 
                if($loggedin == 1){
                    echo($form->field($model, 'email')->textInput(['readonly' => TRUE ,'value' => $email,'style'=>'background-color:black']));
                }
                else{
                    echo($form->field($model, 'email'));
                }
                ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 10, 'bgcolor' => 'black', 'color' => 'white']) ?>

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
