<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Spcanteenitems */

$this->title = 'Update Spcanteenitems: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Spcanteenitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spcanteenitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
