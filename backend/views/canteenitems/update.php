<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Canteenitems */

$this->title = 'Update Canteenitems: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Canteenitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="canteenitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
