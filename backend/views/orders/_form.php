<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateTime')->textInput() ?>

    <?= $form->field($model, 'rollNo')->textInput() ?>

    <?= $form->field($model, 'itemsCount')->textInput() ?>

    <?= $form->field($model, 'grandTotal')->textInput() ?>

    <?= $form->field($model, 'uniqueID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderStatus')->dropDownList([ 'Pending' => 'Pending', 'Completed' => 'Completed', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
