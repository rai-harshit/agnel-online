<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\Alert;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
<div class=container style="padding-right:10px">
<?= Alert::widget() ?>

    
    <div class="heading">
    <center>
    <h2><b><?= Html::encode($this->title) ?></b></h2>
    </center>
    </div>
    <br/>

        <div class="col-lg-5">

            <div class="nav nav-pills" style="padding-bottom:3px">
                    <li class="pull-right">
                        <a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#login') ?>" style=" color:white; background-color: black">HELP</a>
                    </li>
            </div>
            <b>
            <p>Please fill out the following fields to login:</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'roll_no')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:green;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>
            </b>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <br/>
</div>
</div>
