<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
<div class=container style="padding-right:10px">
    <div class="heading">
    <center>
    <h2><b><?= Html::encode($this->title) ?></b></h2>
    </center>
    </div>
    <br/>

        <div class="col-lg-5" style="width:100%;">
        <b>
            <p>Please fill out the following fields to signup:</p>
            <?php Pjax::begin(); ?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'roll_no')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'branch') ?>
                <?= $form->field($model, 'contact') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
        </b>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
    <br/>
</div>
</div>
