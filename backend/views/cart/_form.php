<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateTime')->textInput() ?>

    <?= $form->field($model, 'rollNo')->textInput() ?>

    <?= $form->field($model, 'itemId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemPrice')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
