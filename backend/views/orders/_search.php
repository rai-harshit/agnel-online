<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdersClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderNo') ?>

    <?= $form->field($model, 'dateTime') ?>

    <?= $form->field($model, 'rollNo') ?>

    <?= $form->field($model, 'itemsCount') ?>

    <?= $form->field($model, 'grandTotal') ?>

    <?php // echo $form->field($model, 'uniqueID') ?>

    <?php // echo $form->field($model, 'orderStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
