<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderitemsClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderitems-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uniqueID') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orderNo') ?>

    <?= $form->field($model, 'ordered_item') ?>

    <?= $form->field($model, 'prepStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
