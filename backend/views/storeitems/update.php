<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Storeitems */

$this->title = 'Update Storeitems: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Storeitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="storeitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
